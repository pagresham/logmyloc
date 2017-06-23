-- Selects basic info for all users who are friends with 12;
SELECT u.f_name, u.l_name, u.u_name, u.u_id
FROM users u
JOIN friends f 
ON u.u_id = f.f_2 
WHERE f.f_1 = 12 -- u_id of logged in user


