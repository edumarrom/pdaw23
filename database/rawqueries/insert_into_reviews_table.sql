WITH
published_courses AS (
    SELECT
        id
    FROM
        courses
    WHERE
        status  = '3'
),
existing_users AS (
    SELECT
        *
    FROM
        users
)

INSERT INTO reviews (comment, rating, course_id, user_id)
VALUES

(
    'Lorem Ipsum',
    (SELECT FLOOR(RANDOM() * (5-1+1) + 1)::int),
    (SELECT id FROM published_courses ORDER BY RANDOM() LIMIT 1),
    (SELECT id FROM existing_users ORDER BY RANDOM() LIMIT 1)
),
(
    'Lorem Ipsum',
    (SELECT FLOOR(RANDOM() * (5-1+1) + 1)::int),
    (SELECT id FROM published_courses ORDER BY RANDOM() LIMIT 1),
    (SELECT id FROM existing_users ORDER BY RANDOM() LIMIT 1)
),
(
    'Lorem Ipsum',
    (SELECT FLOOR(RANDOM() * (5-1+1) + 1)::int),
    (SELECT id FROM published_courses ORDER BY RANDOM() LIMIT 1),
    (SELECT id FROM existing_users ORDER BY RANDOM() LIMIT 1)
),
(
    'Lorem Ipsum',
    (SELECT FLOOR(RANDOM() * (5-1+1) + 1)::int),
    (SELECT id FROM published_courses ORDER BY RANDOM() LIMIT 1),
    (SELECT id FROM existing_users ORDER BY RANDOM() LIMIT 1)
),
(
    'Lorem Ipsum',
    (SELECT FLOOR(RANDOM() * (5-1+1) + 1)::int),
    (SELECT id FROM published_courses ORDER BY RANDOM() LIMIT 1),
    (SELECT id FROM existing_users ORDER BY RANDOM() LIMIT 1)
),
(
    'Lorem Ipsum',
    (SELECT FLOOR(RANDOM() * (5-1+1) + 1)::int),
    (SELECT id FROM published_courses ORDER BY RANDOM() LIMIT 1),
    (SELECT id FROM existing_users ORDER BY RANDOM() LIMIT 1)
),
(
    'Lorem Ipsum',
    (SELECT FLOOR(RANDOM() * (5-1+1) + 1)::int),
    (SELECT id FROM published_courses ORDER BY RANDOM() LIMIT 1),
    (SELECT id FROM existing_users ORDER BY RANDOM() LIMIT 1)
),
(
    'Lorem Ipsum',
    (SELECT FLOOR(RANDOM() * (5-1+1) + 1)::int),
    (SELECT id FROM published_courses ORDER BY RANDOM() LIMIT 1),
    (SELECT id FROM existing_users ORDER BY RANDOM() LIMIT 1)
)
;
