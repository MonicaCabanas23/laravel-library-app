-- Escribe una consulta para contar cuántas actividades (actividads) existen por cada tipo_actividad_id.
SELECT tipo_actividad_id, COUNT(*) AS cantidad_actividades
FROM actividads 
GROUP BY tipo_actividad_id
ORDER BY tipo_actividad_id ASC;

-- ¿Cómo realizarías una consulta para encontrar todas las actividades que no tienen sub actividades asociadas?
SELECT id, nombre
FROM actividads 
WHERE id NOT IN (
    SELECT actividad_id 
    FROM sub_actividads
);

-- ¿Cómo harías una consulta para calcular el porcentaje promedio de avance (porcentaje_avance) de todas las sub actividades (sub_actividads) de una actividad específica?
SELECT a.id AS actividad_id,
    (SUM(sa.porcentaje_avance) / COUNT(sa.porcentaje_avance)) AS promedio_porcentaje_avance
FROM actividads a
INNER JOIN sub_actividads sa 
    ON a.id = sa.actividad_id
GROUP BY a.id;

SELECT r.id AS responsable_id, 
    r.nombre AS nombre_responsable,
    a.nombre AS nombre_actividad,
    SUM(sa.porcentaje_avance) / COUNT(sa.porcentaje_avance) AS promedio_porcentaje_avance
FROM responsables r
INNER JOIN sub_actividads sa
    ON r.id = sa.responsable_id
INNER JOIN actividads a
    ON sa.actividad_id = a.id
GROUP BY r.id, a.nombre
ORDER BY r.id ASC;

