use helpdesk
DELIMITER //
create trigger call_proc4 AFTER INSERT ON answer
FOR EACH ROW
BEGIN
	DECLARE countV INT(11);
    SELECT answerCount INTO countV from question where id = NEW.question;
    UPDATE question SET answerCount = countV+1 WHERE id = NEW.question;
END //