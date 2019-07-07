#-*- coding:utf-8 -*-
import re
import this
print(this)
file = 'essay.txt'
num = 0
with open(file,'r') as f:
    for line in f:
        word = re.split('\s+',line)
        num += len(word)
print(num)