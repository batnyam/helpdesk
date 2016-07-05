use helpdesk
DELIMITER //
create trigger rank AFTER UPDATE ON answer
FOR EACH ROW
BEGIN
	DECLARE answerCount INT(11);
    DECLARE favCount INT(11);
    DECLARE quesCount INT(11);
    DECLARE comCount INT(11);
    
    SELECT COUNT(id) INTO answerCount FROM answer WHERE created_user = NEW.created_user AND deleted=0;
    SELECT SUM(favouriteCount) INTO favCount FROM answer WHERE created_user = NEW.created_user AND deleted=0;
    SELECT COUNT(id) INTO quesCount FROM question WHERE created_user = NEW.created_user AND deleted = 0;
    SELECT COUNT(id) INTO comCount FROM comment WHERE created_user = NEW.created_user AND deleted = 0;
    
	IF( answerCount > 10 ) THEN
		IF( favCount > 15 ) THEN 
			IF( quesCount > 10 ) THEN
				IF( comCount > 10 ) THEN 
					UPDATE users SET rank = 2 WHERE id=NEW.created_user; 
				END IF;
			END IF;
		ELSEIF( favCount < 10 ) THEN
			UPDATE users SET rank = 1 WHERE id=NEW.created_user;
		END IF;
	ELSEIF( answerCount < 10 ) THEN 
		UPDATE users SET rank = 1 WHERE id=NEW.created_user;
	ELSEIF( answerCount > 20 ) THEN 
		IF( favCount > 20 ) THEN
			UPDATE users SET rank=3 WHERE id=NEW.created_user;
		END IF;
    END IF;
END //