CREATE DATABASE reservationDB;

CREATE TABLE Users {
    Reservation     NVARCHAR(255),
    PersonID        NVARCHAR(255),
    ReservationDate NVARCHAR(255),
    ReservationTime NVARCHAR(255),
    FirstName       NVARCHAR(255),
    LastName        NVARCHAR(255),
    Email           NVARCHAR(255)
} 