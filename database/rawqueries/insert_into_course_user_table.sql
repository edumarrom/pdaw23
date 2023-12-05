WITH
published_courses AS (
    SELECT id
    FROM   courses
    WHERE  status  = '3'
),
existing_users AS (
    SELECT *
    FROM   users
)

INSERT INTO course_user(course_id, user_id)
VALUES (
    (SELECT id FROM published_courses ORDER BY RANDOM() LIMIT 1),
    (SELECT id FROM existing_users ORDER BY RANDOM() LIMIT 1)
);
