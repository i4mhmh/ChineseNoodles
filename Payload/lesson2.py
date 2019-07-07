#审一下题发现就是随机数问题,从a-Z,0-9里边调几位数就行,挑选完之后拼接还可以给字符串来一个随机
import random
def random_me():
    #定义一个数组存放得到的数据
    list_me = []
    num = random.randint(1,9)
    list_me.append(str(num))
    #这里大写利用ascii码 randint(a,b)  x>=a && x<=b 那个人写的取不到b我晕
    char_a = random.randint(65,90)
    list_me.append(chr(char_a))
    #这里小写
    char_A = random.randint(97,122)
    list_me.append(chr(char_A))
    #拼接数组内字符串 random.sample(数组,从数组中抽取的数)
    get_me = ''.join(random.sample(list_me,3))
    return(get_me)
random_me()