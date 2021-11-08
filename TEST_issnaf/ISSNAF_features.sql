USE `issnaf_public2`;

-- Populate Data to each Drop down list Filter
-- First Name
select first_name from `person` order by person_id; 

-- Middle Name
select middle_name from `person` order by person_id; 

-- Last Name
select last_name from `person` order by person_id; 

-- Full Name 
select full_name from `person` order by person_id;

-- Primary Email
select primary_email from `person` order by person_id;

-- Gender
select distinct gender from `person`;

-- Image URL
select image_url from `person` order by person_id;

-- Linkin page 
select linkedin_page from `person` order by person_id;

-- Research page 
select researchgate_page from `person` order by person_id;

-- Web Page
select web_page from `person` order by person_id;

-- Specialty Name 
select distinct specialty_name from `person` order by specialty_name;

-- discipline_id -> discipline_ full_name 
select distinct discipline_full_name from `discipline` order by discipline_full_name;



-- Display Data:
-- Display a person's discipline
select person_id, `person`.discipline_id, discipline_full_name 
from `person`, `discipline` 
where `person`.discipline_id = `discipline`.discipline_id
order by person_id;




-- Display a person's profile
select person_id, `person`.profile_id, status, status_asof 
from `person`, `issnaf_profile`
where `person`.profile_id = `issnaf_profile`.profile_id
order by person_id;





-- Display all start date that is not NULL in database
-- select * from education where start_date IS NOT NULL;
-- Display the 3 most recent job
-- Display the last degree earned(the degree with the last end date)


-- Display the one most recent job:
select job.person_id, full_name, institute, department, job_title, job_normalized_title, max(start_date)
from person, job
where person.person_id = job.person_id and start_date is not NULL and full_name = 'firstN1009 Mid1009 lastN1009'; -- where full_name = ?


-- Display the three most recent jobs
select job.person_id, full_name, institute, department, job_title, job_normalized_title, start_date
from person, job
where person.person_id = job.person_id and 
start_date is not NULL and 
full_name = 'firstN3065 Mid3065 lastN3065' -- where full_name = ?
order by start_date desc
Limit 3; 

-- Display all jobs of a person
select job.person_id, full_name, institute, department, job_title, job_normalized_title, start_date, end_date
from person, job
where person.person_id = job.person_id and 
full_name = 'firstN15 Mid15 lastN15' -- where full_name = ?
order by start_date desc; 






-- Display the last(the most recent) education of a person
select e.person_id, p.full_name, o.organization_id, o.organization_name, e.institute, e.department, e.degree, e.start_date, max(e.end_date)
from organization o, education e, person p
where 
o.organization_id = e.organization_id and e.person_id = p.person_id and  
e.end_date is not null and 
-- p.full_name = 'firstN2129 Mid2129 lastN2129'; -- where p.full_name = ?
p.person_id = 3065;  -- where p.person_id = ?


-- Display all educations of a person
select e.person_id, p.full_name, o.organization_id, o.organization_name, e.institute, e.department, e.degree, e.start_date, e.end_date
from organization o, education e, person p
where 
o.organization_id = e.organization_id and e.person_id = p.person_id and  
-- p.full_name = 'firstN2129 Mid2129 lastN2129'; -- where p.full_name = ?
p.person_id = 3065  -- where p.person_id = ?
order by e.end_date desc;




-- Display orgnization 
select o.organization_name, o.organization_url, l.city, l.state, l.country, o.organization_type
from organization o, location l
where o.location_id = l.location_id; 



