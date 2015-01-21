files = `dir *.php /b`.split("\n")

files.each do |file| 
	puts "File: " + file

	content = File.read(file)
	first_line = content.split(/\n/)[0]
	change = false

	if content.include? "mysql_connect(\"localhost\",\"root\",\"rootpass\")"

		puts "Contains connect"
		content = content.gsub("mysql_connect(\"localhost\",\"root\",\"rootpass\")","mysql_connect($dbhost,$dbusr,$dbpw)")
		change = true

	end

	if content.include? "mysql_pconnect(\"localhost\",\"root\",\"rootpass\")"

		puts "Contains pconnect"
		content = content.gsub("mysql_pconnect(\"localhost\",\"root\",\"rootpass\")","mysql_pconnect($dbhost,$dbusr,$dbpw)")
		change = true

	end

	if content.include? "\"46.238.53.111\""

		puts "Contains ip"
		content = content.gsub("\"46.238.53.111\"","$aip2")
		change = true

	end

	if change
		content = "<?php require_once '../config.php'; ?>\n" + content
	end

	File.open(file, "w") do |file| 
		file.puts content
	end

	puts "---"

end

print "Done"