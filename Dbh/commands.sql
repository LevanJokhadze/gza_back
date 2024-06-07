-- Create table
create table list(
	id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    title LONGTEXT NOT NULL,
    content LONGTEXT NOT NULL
);

-- Insert Test data

insert into list (title, content) values ("რა ეკრძალება სასჯელმოხდილ პირს ?", "მას ეკრძალება ბლა ბლა ბლა");