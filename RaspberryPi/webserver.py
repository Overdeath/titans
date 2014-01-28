import bottle
import os
from bottle import route, run, template

@route('/aprinde')
def index():
	#f = open('/sys/class/gpio/export', 'w')
	#f.write('27')
	#f.close()
	#f = open('/sys/class/gpio/gpio27/direction', 'w')
        #f.write('out')
        #f.close()
	f = open('/sys/class/gpio/gpio27/value', 'w')
	f.write('1')
	f.close()
	os.system('aplay /home/pi/sirena.wav &')
	return '<h1>Am aprins ledul</h1>'

@route('/stinge')
def turnoffled():
	#f = open('/sys/class/gpio/export', 'w')
        #f.write('27')
        #f.close()
        #f = open('/sys/class/gpio/gpio27/direction', 'w')
        #f.write('out')
        #f.close()
	f = open('/sys/class/gpio/gpio27/value', 'w')
	f.write('0')
	f.close()
	return '<h1>Am stins ledul</h1>'

run(host='0.0.0.0', port=8082)
