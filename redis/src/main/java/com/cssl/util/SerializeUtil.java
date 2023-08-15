package com.cssl.util;

import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;

/**
 * 序列化对象
 * @author tym
 */
public class SerializeUtil {

    /**
     * 将对象序列化成byte[]
     * @param object
     * @return
     */
    public static byte[] serialize(Object object) {
        ObjectOutputStream oos = null;
        ByteArrayOutputStream baos = null;        //FileOutputStream("e:/data.dat")
        try {
            // 序列化:new FileOutputStream("e:/data.dat");
            baos = new ByteArrayOutputStream();
            oos = new ObjectOutputStream(baos);
            oos.writeObject(object);
            byte[] bytes = baos.toByteArray();
            return bytes;
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            try {
                oos.close();
                baos.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        return null;
    }

    /**
     * 将byte[]反序列化成对象
     * @param bytes
     * @return
     */
    public static Object unserialize(byte[] bytes) {
        ByteArrayInputStream bais = null;
        ObjectInputStream ois = null;
        try {
            // 反序列化:new FileInputStream("e:/data.dat");
            bais = new ByteArrayInputStream(bytes);
            ois = new ObjectInputStream(bais);
            return ois.readObject();
        } catch (Exception e) {
            e.printStackTrace();
        } finally {
            try {
                ois.close();
                bais.close();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
        return null;
    }
}
