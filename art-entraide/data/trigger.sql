-----------------------
-- INSERTION ANNONCE --
-----------------------
CREATE FUNCTION IF NOT EXISTS f_insert_annonce() RETURNS TRIGGER AS $$
BEGIN
  RAISE NOTICE 'insertion annonce';
  new := old;
  new.date_creation := current_date;
  RAISE NOTICE 'date_creation forcée à %', current_date;
  if(new.date_service is not null AND new.date_service < current_date)
  then
    RAISE EXCEPTION 'date_service est passée';
  end if;

  return new;
END;
$$ LANGUAGE 'plpgsql';


CREATE TRIGGER IF NOT EXISTS T_ANNONCE BEFORE INSERT
  ON Utilisateur
  FOR EACH ROW
  EXECUTE PROCEDURE f_insert_annonce();

-----------------------
-- INSERTION MESSAGE --
-----------------------

CREATE FUNCTION IF NOT EXISTS f_insert_message() RETURNS TRIGGER AS $$
BEGIN
  RAISE NOTICE 'insertion message';
  new := old;
  new.date_message := current_timestamp;
  RAISE NOTICE 'date_message forcée à %', current_timestamp;
  if()
  return new;
END;
$$ LANGUAGE 'plpgsql';


CREATE TRIGGER IF NOT EXISTS T_MESSAGE
  BEFORE INSERT
  ON Message
  FOR EACH ROW
  EXECUTE PROCEDURE f_insert_message();
