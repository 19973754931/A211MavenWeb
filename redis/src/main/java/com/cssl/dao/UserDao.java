package com.cssl.dao;

import com.cssl.pojo.User;

import com.cssl.util.SerializeJsonUtil;
import redis.clients.jedis.Jedis;

import java.util.HashMap;
import java.util.Map;


public class UserDao {
    public static Map<String, User> personMap = new HashMap<>();

    public static void main(String[] args) {

        int i=10;
        System.out.println("i"+i);




        // 1、 new Jedis 对象即可
        //Jedis jedis = new Jedis("192.168.13.130", 6379);
        Jedis jedis=new Jedis("192.168.254.129",6379);
        jedis.auth("123456"); // 进行身份验证
        User user = new User();
       user.setId(1);
       user.setName("tom");
        String serializedObject = SerializeJsonUtil.serialize(user); // 使用你选择的序列化方法
        jedis.set("user:1", serializedObject);
        personMap.put("user:1", user);
        String serializedObject1 = jedis.get("User:1");
        User u = (User) SerializeJsonUtil.unserialize(serializedObject); // 使用你选择的反序列化方法
        System.out.println(u);
    }
}
