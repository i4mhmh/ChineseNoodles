#-*- coding:utf-8 -*-
# 1 3 5 7 8 10 12 31天 2闰年29 平年28 4 6 8 10 11 30天 
def days_com():
    month = int(input("please input month:"))
    day = int(input("please input day:"))
    year = int(input("please input year:"))
    num = 0
    if(year%4==0)&(year%100 != 0):
        for months in range(1,month+1):
            if months%2==0:
                if months == 2:
                    num +=29
                else:
                    num +=30 
days_com()