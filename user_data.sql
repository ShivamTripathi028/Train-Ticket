SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- CREATING A TABLE TO STORE USER INFO
CREATE TABLE `user_data` (
  `srno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- INSERTING SOME VALUES INITIALLY
INSERT INTO `user_data` (`srno`, `name`, `email`, `phone`, `password`, `date`) VALUES
(1, 'Shivam Tripathi', 'shivamamartripathi2004@gmail.com', '7977300083', 'a6a32d191c010338f46ea55d3883f17d', '2023-02-05 22:58:18');



-- MAKING 'SRNO' A PRIMARY KEY
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`srno`);



-- SETTING THE AUTO INCREMENT TO 2
ALTER TABLE `user_data`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;