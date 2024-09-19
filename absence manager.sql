create table users(
	id serial primary key,
	name varchar(255),
	email varchar(255),
	job varchar(255),
	password varchar(255)
);
create table project(
	project_id serial primary key,
	ProjectName varchar(255),
	Description text,
	contactProfessional varchar(500),
	toolsConcerns varchar(500),
	DSI varchar(255),
	estLoad int,
	startDate date,
	endDate date,
	status bool,
	commentPro varchar(500)
	
);
create table absences(
	absence_id serial primary key,
	typeAbscence varchar(255),
	startDate date,
	endDate date,
	userId int,
	Foreign key (userId) References users (id),
	status bool
);
create table resource(
	
	availableTeam varchar(255),
	ResourcesTeam varchar(255)
);
create table task(
	task_id serial primary key,
	taskName varchar(255),
	DescriptionStain text,
	startDate date,
	projectId int,
	Foreign key (projectId) References project (project_id),
	userId int,
	Foreign key (userId) References users (id)
);
	
-- Create trigger function to delete tasks associated with the deleted project
CREATE OR REPLACE FUNCTION delete_tasks_on_project_delete()
RETURNS TRIGGER AS $$
BEGIN
    DELETE FROM task WHERE projectId = OLD.project_id;
    RETURN OLD;
END;
$$ LANGUAGE plpgsql;

-- Create trigger to activate the trigger function when a project is deleted
CREATE TRIGGER delete_tasks_trigger
BEFORE DELETE ON project
FOR EACH ROW
EXECUTE FUNCTION delete_tasks_on_project_delete();
--trigger2
CREATE OR REPLACE FUNCTION delete_user_data()
RETURNS TRIGGER AS
$$
BEGIN
    -- Delete tasks associated with the user
    DELETE FROM task WHERE userId = OLD.id;
    
    -- Delete absences associated with the user
    DELETE FROM absences WHERE userId = OLD.id;

    RETURN OLD;
END;
$$
LANGUAGE plpgsql;

CREATE TRIGGER trigger_delete_user_data
BEFORE DELETE ON users
FOR EACH ROW
EXECUTE FUNCTION delete_user_data();

