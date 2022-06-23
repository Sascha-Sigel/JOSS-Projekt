describe TVideos;
describe TAusleihen;

INSERT INTO TVideos VALUES
(null, 'Westfield', '01:41:00', 'Action', '2014', 16, 5.00, 15.00, 1),
(null, 'Kharkov', '01:41:00', 'Action', '2014', 16, 5.00, 15.00, 1),
(null, 'Kiev', '01:41:00', 'Action', '2014', 16, 5.00, 15.00, 1),
(null, 'Studzianki', '01:41:00', 'Action', '2014', 16, 5.00, 15.00, 1),
(null, 'Minsk', '01:41:00', 'Action', '2014', 16, 5.00, 15.00, 1),
(null, 'Stalingrad', '01:41:00', 'Action', '2014', 16, 5.00, 15.00, 1),
(null, 'El Halluf', '01:41:00', 'Action', '2014', 16, 5.00, 15.00, 1);

select * from TVideos;

INSERT INTO TAusleihen VALUES
(NULL, now(), '2022-07-30', 1001, 1000),
(NULL, now(), '2022-07-30', 1002, 1000),
(NULL, now(), '2022-07-30', 1003, 1000),
(NULL, now(), '2022-07-30', 1004, 1000),
(NULL, now(), '2022-07-30', 1005, 1000),
(NULL, now(), '2022-07-30', 1006, 1000),
(NULL, now(), '2022-07-30', 1007, 1000);
