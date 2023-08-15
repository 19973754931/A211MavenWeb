package com.cssl.util;

import com.alibaba.fastjson.JSON;
import com.alibaba.fastjson.parser.ParserConfig;
import com.alibaba.fastjson.serializer.SerializerFeature;

import java.io.*;

/**
 * 序列化对象
 * @author tym
 */
public class SerializeJsonUtil {
    static {
        // 启用FastJSON的自动类型支持
        ParserConfig.getGlobalInstance().setAutoTypeSupport(true);
    }

    /**
     * 将对象序列化成String
     * @param object
     * @return
     */
    public static String serialize(Object object) {
        return JSON.toJSONStringWithDateFormat(
                object,
                "yyyy-MM-dd hh:mm:ss",
                SerializerFeature.WriteClassName);
    }

    /**
     * 将String反序列化成对象
     * @param json
     * @return
     */
    public static Object unserialize(String json) {
        return JSON.parse(json);
    }
}
