#链接数据库
#-*- coding:utf-8 -*-
import MySQLdb
import  lesson2
def link(num):
    con = MySQLdb.connect(
        host = '127.0.0.1',
        port = 3306,
        user = 'root',
        passwd = 'root',
        db = 'test',
    )
    #定义一个游标,就跟画笔一个性质
    cur = con.cursor()
    #如果是插入的字母需要加双引号"%s"
    cur.execute('insert into data values("%s")' %(num))
    cur.close()
    con.commit()
    con.close()
def main():
    i = 0
    while i < 200:
        vcode = lesson2.random_me()
        link(vcode)
        i+=1
        print('插入第%s个' %i)
main()