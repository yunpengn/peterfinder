psql < create_database.sql
psql -d peterfinder < create_table.sql
psql -d peterfinder < create_trigger.sql
psql -d peterfinder < load_data.sql