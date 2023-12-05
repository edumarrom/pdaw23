#!/bin/bash

if [ "$#" -ne 2 ]; then
    echo "Uso: $0 <archivo_sql> <num_ejecuciones>"
    exit 1
fi

SQL_FILE="$1"
NUM_EXECUTIONS="$2"
HOST="localhost"
USER="dabaliu"
DB="dabaliu"

for ((i=1; i<=$NUM_EXECUTIONS; i++)); do

    psql -h $HOST -U $USER -d $DB < $SQL_FILE

done

if [ $? -eq 0 ]; then
    echo "Ejecución exitosa"
    exit 0
else
    echo "Error en la ejecución de psql"
    exit 1
fi
