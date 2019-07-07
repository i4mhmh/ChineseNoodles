#coding:utf-8

import binascii
import string 
import _thread

dic='flage'     #各种打印字符
crc = '0x67C15FEC'     # 记得要以0x开头
def CrackCrc(crc):
    for i in dic :
        for j in dic:
            for p in dic:
                for q in dic:
                    s=i+j+p+q
                    a = str.encode(s)
                    print(binascii.crc32(a))
   
CrackCrc(crc)