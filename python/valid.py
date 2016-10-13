import sys
import pymysql.cursors

# Connect to the database
#print ('Number of arguments:', len(sys.argv), 'arguments.')
#print ('Argument List:', str(sys.argv))
connection = pymysql.connect(host='localhost',
                             user='root',
                             password='pi',
                             db='dae',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)

try:
    with connection.cursor() as cursor:
        # Create a new record
        sql = "UPDATE `dae`.`settings` SET `token` = '1' WHERE `settings`.`id` = %s;"

        cursor.execute(sql, (str(sys.argv[1])))

    # connection is not autocommit by default. So you must commit to save
    # your changes.
    connection.commit()

finally:
    connection.close()
    print("id:",str(sys.argv[1])," setting vaild!")
