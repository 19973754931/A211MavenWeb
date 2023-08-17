package com.cssl;

import org.junit.jupiter.api.Test;
import org.springframework.boot.test.context.SpringBootTest;
import redis.clients.jedis.Jedis;

@SpringBootTest
class RedisApplicationTests {


    @Test
    void contextLoads() {
        Jedis jedis=new Jedis("192.168.254.129",6379);
        jedis.auth("123456");
        jedis.flushDB();//清空当前库的所有数据
        jedis.set("name","admin");
        jedis.set("age","23");
        jedis.set("high","173");
        System.out.println("name:"+jedis.get("name")+"\nage:"+jedis.get("age")+"\nhigh"+jedis.get("high"));

        jedis.lpush("list","1","2","3","4");
        System.out.println("list: "+jedis.lrange("list",0,-1));

    }

}
