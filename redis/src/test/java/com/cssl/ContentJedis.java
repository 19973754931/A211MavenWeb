package com.cssl;

import redis.clients.jedis.Jedis;

public class ContentJedis {

    public static void main(String[] args){
        Jedis jedis=new Jedis("192.168.254.129",6379);
        jedis.auth("123456");
        System.out.println(jedis.ping());
    }
}
