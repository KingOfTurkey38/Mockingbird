<?php

namespace ethaniccc\Mockingbird\utils;

use pocketmine\math\AxisAlignedBB;
use pocketmine\math\Vector3;
use pocketmine\block\{BlockFactory, BlockIds, BlockTypeIds};
use ethaniccc\Mockingbird\utils\boundingbox\AABB;

// not in use for now, will use in next update probably.
final class UnknownBlockAABBList{

    private static $list = [];

    public static function registerDefaults(): void{
        self::registerAABB(new AABB(0.125, 0.0, 0.125, 0.875, 0.875, 0.875), BlockTypeIds::BREWING_STAND);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.75, 1.0), BlockTypeIds::ENCHANTING_TABLE);
        //Lever
        self::registerAABB(new AABB(0.25, 0.375, 0.25, 0.75, 1.0, 0.75), BlockTypeIds::LEVER);
        self::registerAABB(new AABB(0.3125, 0.25, 0.625, 0.625, 0.75, 1.0), BlockTypeIds::LEVER, 1);
        self::registerAABB(new AABB(0.3125, 0.25, 0.0, 0.625, 0.75, 0.375), BlockTypeIds::LEVER, 2);
        self::registerAABB(new AABB(0.0, 0.25, 0.3125, 0.375, 0.75, 0.625), BlockTypeIds::LEVER, 3);
        self::registerAABB(new AABB(0.625, 0.25, 0.3125, 1.0, 0.75, 0.625), BlockTypeIds::LEVER, 4);
        self::registerAABB(new AABB(0.25, 0.0, 0.25, 0.75, 0.625, 0.75), BlockTypeIds::LEVER, 5);
        self::registerAABB(new AABB(0.25, 0.0, 0.25, 0.75, 0.625, 0.75), BlockTypeIds::LEVER, 6);
        self::registerAABB(new AABB(0.25, 0.375, 0.25, 0.75, 1.0, 0.75), BlockTypeIds::LEVER, 7);
        self::registerAABB(new AABB(0.25, 0.375, 0.25, 0.75, 1.0, 0.75), BlockTypeIds::LEVER, 8);
        self::registerAABB(new AABB(0.3125, 0.25, 0.625, 0.625, 0.75, 1.0), BlockTypeIds::LEVER, 9);
        self::registerAABB(new AABB(0.3125, 0.25, 0.0, 0.625, 0.75, 0.375), BlockTypeIds::LEVER, 10);
        self::registerAABB(new AABB(0.0, 0.25, 0.3125, 0.375, 0.75, 0.625), BlockTypeIds::LEVER, 11);
        self::registerAABB(new AABB(0.625, 0.25, 0.3125, 1.0, 0.75, 0.625), BlockTypeIds::LEVER, 12);
        self::registerAABB(new AABB(0.25, 0.0, 0.25, 0.75, 0.625, 0.75), BlockTypeIds::LEVER, 13);
        self::registerAABB(new AABB(0.25, 0.0, 0.25, 0.75, 0.625, 0.75), BlockTypeIds::LEVER, 14);
        self::registerAABB(new AABB(0.25, 0.375, 0.25, 0.75, 1.0, 0.75), BlockTypeIds::LEVER, 15);
        //Pressure Plates
        foreach([BlockTypeIds::STONE_PRESSURE_PLATE, BlockTypeIds::OAK_PRESSURE_PLATE, BlockTypeIds::ACACIA_PRESSURE_PLATE, BlockTypeIds::WEIGHTED_PRESSURE_PLATE_HEAVY] as $id){
            self::registerAABB(new AABB(0.0625, 0.0, 0.0625, 0.9375, 0.0625, 0.9375), $id);
            for($i = 1; $i <= 15; ++$i){
                self::registerAABB(new AABB(0.0625, 0.0, 0.0625, 0.9375, 0.03125, 0.9375), $id, $i);
            }
        }
        //Signs
        //self::registerAABB(new AABB(0.25, 0.0, 0.25, 0.75, 1.0, 0.75), BlockTypeIds::STANDING_SIGN);
        //self::registerAABB(new AABB(0.875, 0.28125, 0.0, 1.0, 0.78125, 1.0), BlockTypeIds::WALL_SIGN, 2);
        //self::registerAABB(new AABB(0.0, 0.28125, 0.0, 0.125, 0.78125, 1.0), BlockTypeIds::WALL_SIGN, 3);
        //self::registerAABB(new AABB(0.0, 0.28125, 0.0, 1.0, 0.78125, 0.125), BlockTypeIds::WALL_SIGN, 4);
        //self::registerAABB(new AABB(0.0, 0.28125, 0.875, 1.0, 0.78125, 1.0), BlockTypeIds::WALL_SIGN, 5);
        ////Daylight Sensor
        //self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.375, 1.0), BlockTypeIds::DAYLIGHT_SENSOR);
        //self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.375, 1.0), BlockTypeIds::DAYLIGHT_SENSOR_INVERTED);
        ////Wheat
        //self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.140125, 1.0), BlockTypeIds::WHEAT_BLOCK);
        //self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.28125, 1.0), BlockTypeIds::WHEAT_BLOCK, 1);
        //self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.4375, 1.0), BlockTypeIds::WHEAT_BLOCK, 2);
        //self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.5625, 1.0), BlockTypeIds::WHEAT_BLOCK, 3);
        //self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.71875, 1.0), BlockTypeIds::WHEAT_BLOCK, 4);
        //self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.90625, 1.0), BlockTypeIds::WHEAT_BLOCK, 5);
        //self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 1.0, 1.0), BlockTypeIds::WHEAT_BLOCK, 6);
        //self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 1.140125, 1.0), BlockTypeIds::WHEAT_BLOCK, 7);
        ////Mushrooms
        //self::registerAABB(new AABB(0.3125, 0.0, 0.3125, 0.6875, 0.375, 0.6875), BlockTypeIds::RED_MUSHROOM);
        //self::registerAABB(new AABB(0.3125, 0.0, 0.3125, 0.6875, 0.375, 0.6875), BlockTypeIds::BROWN_MUSHROOM);
        //Nether Wart
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.25, 1.0), BlockTypeIds::NETHER_WART);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.5, 1.0), BlockTypeIds::NETHER_WART, 1);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.75, 1.0), BlockTypeIds::NETHER_WART, 2);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 1.0, 1.0), BlockTypeIds::NETHER_WART, 3);
        //Stems
        foreach([BlockTypeIds::PUMPKIN_STEM, BlockTypeIds::MELON_STEM] as $stem){
            self::registerAABB(new AABB(0.375, 0.0, 0.375, 0.625, 0.125, 0.625), $id);
            for($i = 2; $i <= 8; ++$i){
                self::registerAABB(new AABB(0.375, 0.0, 0.375, 0.625, $i*0.125, 0.625), $id, $i-1);
            }
        }
        //Carrots
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.09375, 1.0), BlockTypeIds::CARROTS);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.1875, 1.0), BlockTypeIds::CARROTS, 1);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.3125, 1.0), BlockTypeIds::CARROTS, 2);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.40625, 1.0), BlockTypeIds::CARROTS, 3);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.5, 1.0), BlockTypeIds::CARROTS, 4);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.59375, 1.0), BlockTypeIds::CARROTS, 5);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.6875, 1.0), BlockTypeIds::CARROTS, 6);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.8125, 1.0), BlockTypeIds::CARROTS, 7);
        //Beetroot/Potatoes
        foreach([BlockTypeIds::BEETROOT, BlockTypeIds::POTATOES] as $crop){
            self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.09375, 1.0), $crop);
            self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.1875, 1.0), $crop, 1);
            self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.25, 1.0), $crop, 2);
            self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.34375, 1.0), $crop, 3);
            self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.4375, 1.0), $crop, 4);
            self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.5, 1.0), $crop, 5);
            self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.59375, 1.0), $crop, 6);
            self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.6975, 1.0), $crop, 7);
        }
        //Tripwire
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.5, 1.0), BlockTypeIds::TRIPWIRE);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.09375, 1.0), BlockTypeIds::TRIPWIRE, 1);
        //Sapling
   //     self::registerAABB(new AABB(0.09375, 0.0, 0.09375, 0.90625, 0.8125, 0.90625), BlockTypeIds::SAPLING);
        //Banner
      //  self::registerAABB(new AABB(0.25, 0.0, 0.25, 0.75, 1.0, 0.75), BlockTypeIds::STANDING_BANNER);
        self::registerAABB(new AABB(0.0, 0.0, 0.875, 1.0, 0.78125, 1.0), BlockTypeIds::WALL_BANNER, 2);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.78125, 0.125), BlockTypeIds::WALL_BANNER, 3);
        self::registerAABB(new AABB(0.875, 0.0, 0.0, 1.0, 0.78125, 1.0), BlockTypeIds::WALL_BANNER, 4);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 0.125, 0.78125, 1.0), BlockTypeIds::WALL_BANNER, 5);
        //Dead bush
        self::registerAABB(new AABB(0.3125, 0.0, 0.3125, 0.6875, 0.59375, 0.6875), BlockTypeIds::DEAD_BUSH);
        //Vine
        for($i = 3; $i <= 15; ++$i){
            self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 1.0, 1.0), BlockTypeIds::VINE, $i);
        }
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.0625, 1.0), BlockTypeIds::VINE);
        self::registerAABB(new AABB(0.0, 0.0, 0.9375, 1.0, 1.0, 1.0), BlockTypeIds::VINE, 1);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 0.0625, 1.0, 1.0), BlockTypeIds::VINE, 2);
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 1.0, 0.0625), BlockTypeIds::VINE, 4);
        self::registerAABB(new AABB(0.9375, 0.0, 0.0, 1.0, 1.0, 1.0), BlockTypeIds::VINE, 8);
        //Torches
       // foreach([BlockTypeIds::UNLIT_REDSTONE_TORCH, BlockTypeIds::REDSTONE_TORCH, BlockTypeIds::TORCH] as $torch){
       //     self::registerAABB(new AABB(0.0, 0.203125, 0.34375, 0.3125, 0.796875, 0.65625), $torch, 1);
       //     self::registerAABB(new AABB(0.6875, 0.203125, 0.34375, 1.0, 0.796875, 0.65625), $torch, 2);
       //     self::registerAABB(new AABB(0.34375, 0.203125, 0.0, 0.65625, 0.796875, 0.3125), $torch, 3);
       //     self::registerAABB(new AABB(0.34375, 0.203125, 0.6875, 0.65625, 0.796875, 1.0), $torch, 4);
       //     self::registerAABB(new AABB(0.40625, 0.0, 0.40625, 0.59375, 0.59375, 0.59375), $torch, 5);
       // }
        //Buttons
        foreach([BlockTypeIds::STONE_BUTTON, BlockTypeIds::WOODEN_BUTTON] as $button){
            self::registerAABB(new AABB(0.3125, 0.875, 0.375, 0.6875, 1.0, 0.625), $button);
            self::registerAABB(new AABB(0.3125, 0.0, 0.375, 0.6875, 0.125, 0.625), $button, 1);
            self::registerAABB(new AABB(0.3125, 0.375, 0.875, 0.6875, 0.625, 1.0), $button, 2);
            self::registerAABB(new AABB(0.3125, 0.375, 0.0, 0.6875, 0.625, 0.125), $button, 3);
            self::registerAABB(new AABB(0.875, 0.375, 0.3125, 1.0, 0.625, 0.6875), $button, 4);
            self::registerAABB(new AABB(0.0, 0.375, 0.3125, 0.125, 0.625, 0.6875), $button, 5);
            self::registerAABB(new AABB(0.3125, 0.9375, 0.375, 0.6875, 1.0, 0.625), $button, 6);
            self::registerAABB(new AABB(0.3125, 0.9375, 0.375, 0.6875, 1.0, 0.625), $button, 7);
            self::registerAABB(new AABB(0.3125, 0.375, 0.9375, 0.6875, 0.625, 1.0), $button, 8);
            self::registerAABB(new AABB(0.3125, 0.375, 0.0, 0.6875, 0.625, 0.0625), $button, 9);
            self::registerAABB(new AABB(0.9375, 0.375, 0.3125, 1.0, 0.625, 0.6875), $button, 10);
            self::registerAABB(new AABB(0.0, 0.375, 0.3125, 0.0625, 0.625, 0.6875), $button, 11);
            self::registerAABB(new AABB(0.9375, 0.375, 0.3125, 1.0, 0.625, 0.6875), $button, 12);
            self::registerAABB(new AABB(0.0, 0.375, 0.3125, 0.0625, 0.625, 0.6875), $button, 13);
            self::registerAABB(new AABB(0.3125, 0.9375, 0.375, 0.6875, 1.0, 0.625), $button, 14);
            self::registerAABB(new AABB(0.3125, 0.9375, 0.375, 0.6875, 1.0, 0.625), $button, 15);
        }
        //Fence Gates
       // foreach([BlockTypeIds::FENCE_GATE, BlockTypeIds::SPRUCE_FENCE_GATE, BlockTypeIds::BIRCH_FENCE_GATE, BlockTypeIds::JUNGLE_FENCE_GATE, BlockTypeIds::DARK_OAK_FENCE_GATE, BlockTypeIds::ACACIA_FENCE_GATE] as $gate){
       //     for($i = 0; $i <= 15; ++$i){
       //         if($i%2 == 0){
       //             self::registerAABB(new AABB(0.0, 0.0, 0.375, 1.0, 1.0, 0.625), $gate, $i);
       //         }else{
       //             self::registerAABB(new AABB(0.375, 0.0, 0.0, 0.625, 1.0, 1.0), $gate, $i);
       //         }
       //     }
       // }
        //Tripwire Hook
        for($i = 0; $i <= 15; ++$i){
            switch($i%4){
                case 0:
                    self::registerAABB(new AABB(0.375, 0.0625, 0.0, 0.625, 0.5625, 0.375), BlockTypeIds::TRIPWIRE_HOOK, $i);
                    break;
                case 1:
                    self::registerAABB(new AABB(0.625, 0.0625, 0.375, 1.0, 0.5625, 0.625), BlockTypeIds::TRIPWIRE_HOOK, $i);
                    break;
                case 2:
                    self::registerAABB(new AABB(0.375, 0.0625, 0.625, 0.625, 0.5625, 1.0), BlockTypeIds::TRIPWIRE_HOOK, $i);
                    break;
                case 3:
                    self::registerAABB(new AABB(0.0, 0.0625, 0.375, 0.375, 0.5625, 0.625), BlockTypeIds::TRIPWIRE_HOOK, $i);
                    break;
            }
        }
        //Border block
        self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 1.5, 1.0), 212);
        //Repeater/Comparator
        //foreach([BlockTypeIds::REPEATER_BLOCK, BlockTypeIds::UNPOWERED_REPEATER, BlockTypeIds::COMPARATOR_BLOCK, BlockTypeIds::UNPOWERED_COMPARATOR] as $circuit){
        //    self::registerAABB(new AABB(0.0, 0.0, 0.0, 1.0, 0.125, 1.0), $circuit);
        //}
       // self::registerAABB(new AABB(0.375, 0.5, 0.6875, 0.625, 0.71875, 0.9375), BlockTypeIds::COCOA);
       // self::registerAABB(new AABB(0.0625, 0.5, 0.375, 0.3125, 0.71875, 0.625), BlockTypeIds::COCOA, 1);
       // self::registerAABB(new AABB(0.375, 0.5, 0.0625, 0.625, 0.71875, 0.3125), BlockTypeIds::COCOA, 2);
       // self::registerAABB(new AABB(0.6875, 0.5, 0.375, 0.9375, 0.71875, 0.625), BlockTypeIds::COCOA, 3);
       // self::registerAABB(new AABB(0.3125, 0.3125, 0.5125, 0.6875, 0.75, 0.9375), BlockTypeIds::COCOA, 4);
       // self::registerAABB(new AABB(0.0625, 0.3125, 0.3125, 0.4375, 0.75, 0.6875), BlockTypeIds::COCOA, 5);
       // self::registerAABB(new AABB(0.3125, 0.3125, 0.0625, 0.6875, 0.75, 0.4375), BlockTypeIds::COCOA, 6);
       // self::registerAABB(new AABB(0.5625, 0.3125, 0.3125, 0.9375, 0.75, 0.6875), BlockTypeIds::COCOA, 7);
       // self::registerAABB(new AABB(0.25, 0.1875, 0.4375, 0.75, 0.75, 0.9375), BlockTypeIds::COCOA, 8);
       // self::registerAABB(new AABB(0.0625, 0.1875, 0.25, 0.5625, 0.75, 0.75), BlockTypeIds::COCOA, 9);
       // self::registerAABB(new AABB(0.25, 0.1875, 0.0625, 0.75, 0.75, 0.5625), BlockTypeIds::COCOA, 10);
       // self::registerAABB(new AABB(0.4375, 0.1875, 0.25, 0.9375, 0.75, 0.75), BlockTypeIds::COCOA, 11);
       // self::registerAABB(new AABB(0.375, 0.5, 0.6875, 0.625, 0.71875, 0.9375), BlockTypeIds::COCOA, 12);
       // self::registerAABB(new AABB(0.0625, 0.5, 0.375, 0.3125, 0.71875, 0.625), BlockTypeIds::COCOA, 13);
       // self::registerAABB(new AABB(0.375, 0.5, 0.0625, 0.625, 0.71875, 0.3125), BlockTypeIds::COCOA, 14);
       // self::registerAABB(new AABB(0.6875, 0.5, 0.375, 0.9375, 0.71875, 0.625), BlockTypeIds::COCOA, 15);
    }
  //public static function getFromList(Vector3 $pos, int $id, int $meta = 0) : AxisAlignedBB{
  //    return (self::$list[($id << 4) | $meta] ?? self::$list[$id << 4] ?? AABB::fromBlock(BlockFactory::get($id, $meta)->setComponents(0, 0, 0)))->offsetCopy($pos->x, $pos->y, $pos->z);
  //}
    public static function registerAABB(AABB $aabb, int $id, int $meta = 0): void{
        self::$list[($id << 4) | $meta] = clone $aabb;
    }
}
