use helpdesk
DELIMITER //
create trigger commentCount AFTER INSERT ON comment
FOR EACH ROW
BEGIN
	DECLARE countV INT(11);
    SELECT commentCount INTO countV from question where id = NEW.question;
    UPDATE question SET commentCount = countV+1 WHERE id = NEW.question;
END //