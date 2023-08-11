<?php

namespace ethaniccc\Mockingbird\threads;

use ethaniccc\Mockingbird\utils\MathUtils;
use pmmp\thread\Thread as NativeThread;
use pocketmine\thread\Thread;
use pmmp\thread\ThreadSafeArray;
use pocketmine\snooze\SleeperNotifier;
use pocketmine\thread\log\AttachableThreadSafeLogger;

class CalculationThread extends Thread {

    private $todo;
    private $done;
    private $running = false;
    private $id;
    private $logger;
    private $notifier;
    private static $currentMaxID = 0;
    private static $finishCallableList = [];

    private $tickSpeed = 1;
    private $lastTick;

    public function __construct(AttachableThreadSafeLogger $logger, SleeperNotifier $notifier){
        $this->todo = new ThreadSafeArray();
        $this->done = new ThreadSafeArray();
        $this->logger = $logger;
        $this->id = self::$currentMaxID++;
        $this->notifier = $notifier;
        self::$finishCallableList[$this->id] = [];
        //$this->setClassLoader();
    }

    protected function onRun() : void{
        //$this->registerClassLoader();
        MathUtils::init();
        while($this->running){
            // results will be in batches
            $start = microtime(true);
            foreach($this->todo as $taskID => $callable){
                try{
                    $result = ($callable)();
                    $this->done[$taskID] = $result;
                } catch(\Error $e){
                    $this->logger->debug("Unable to run task on Mockingbird thread | " . $e->getMessage());
                    $this->done[$taskID] = null;
                }
                unset($this->todo[$taskID]);
            }
            $end = microtime(true);
            $this->notifier->wakeupSleeper();
            $tickSpeed = $this->tickSpeed * 0.05;
            if(($delta = ($end - $start)) <= $tickSpeed){
                @time_sleep_until($end + $tickSpeed - $delta);
            } else {
                $this->logger->debug('Mockingbird CalculationThread catching up (no sleep) delta=' . $delta);
            }
        }
    }


    public function start(int $options = NativeThread::INHERIT_NONE): bool
    {
        $this->running = true;
        return parent::start($options);
    }

    public function handleServerTick() : void{
        if($this->lastTick === null){
            $this->lastTick = microtime(true);
        } else {
            $this->tickSpeed = max(round((microtime(true) - $this->lastTick) / 0.05), 1);
            $this->lastTick = microtime(true);
        }
    }



    /**
     * @param callable $do - The callable that should run on the separate thread
     * @param ResultContainer $finish - The callable that should run on the main thread.
     * This method should be called from the main thread ONLY.
     */
    public function addToTodo(callable $do, ResultContainer $finish) : void{
        $this->todo[$finish->getID()] = $do;
        self::$finishCallableList[$this->id][$finish->getID()] = $finish;
    }

    public function finish() : int{
        $finished = 0;
        foreach(self::$finishCallableList[$this->id] as $taskID => $container){
            /** @var ResultContainer $container */
            $result = $this->done[$taskID] ?? null;
            if($result !== null){
                $container->setResult($result);
                $container->run();
                unset($this->done[$taskID]);
                unset(self::$finishCallableList[$this->id][$taskID]);
                $finished++;
            }
        }
        return $finished;
    }

    public function quit(): void
    {
        $this->running = false;
        parent::quit();
    }
}