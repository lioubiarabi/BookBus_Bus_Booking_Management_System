# BookBus: Bus Booking Management System

## A. Domain Analysis

### 1. Reservation Process (User Steps)

#### For Visitors (Unauthenticated)
1. **Trip Search**
   - Enter departure city
   - Enter arrival city
   - Select departure date
   - View available results

#### For Customers (Authenticated)
1. **Authentication**
   - Login with email and password
   - Or create a new account

2. **Selection and Reservation**
   - Choose desired trip
   - Select number of passengers

3. **Confirmation and Payment**
   - Review reservation information
   - Process payment
   - Confirm reservation

4. **After Reservation**
   - Download/view ticket
   - View reservation history
   - Cancellation option (subject to conditions)

5. **Profile Management**
   - Update personal information
   - Manage preferences

### 2. Main Entities Identified

Based on the provided diagrams, here are the main entities:

#### **User**
- Parent entity for Customer and Admin
- Attributes: id, name, email, phone, password
- Role: role (to differentiate Customer/Admin)
- Methods: authentication, creation, update, search

#### **Trip**
- Represents an available bus route
- Attributes: id, departure_city, arrival_city, departure_date, arrival_date, price, busId
- Relationship: assigned to a Bus (1:1)
- Methods: getAllTrips(), findTrip(), isAvailable()

#### **Reservation**
- Link between a user and a trip
- Attributes: id, tripId, userId, passengers_number, status, createdAt
- Relationships: 
  - A User can have multiple Reservations (1:n)
  - A Reservation contains one Trip (1:1)
- Methods: getAllTripReservations(), findReservation()
- Possible statuses: pending, confirmed, cancelled

#### **Bus**
- Represents a vehicle
- Attributes: id, model, registration_number, passengers_limit, status
- Relationship: can be assigned to multiple Trips over time (1:n)
- Methods: getAll(), findBus()

### 3. Administration Flow Observed

#### Bus Management
- Add new buses
- Update information (model, registration, capacity)
- Activate/deactivate buses
- View complete list

#### Trip Management
- Create new trips
- Assign a bus to a trip
- Modify schedules and prices
- Delete/cancel trips
- View all trips

#### Booking Management
- View all reservations
- Modify reservation status
- Cancel reservations
- Search for specific reservations

#### User Management
- View user list
- Activate/deactivate accounts
- Manage roles (Customer/Admin)
- Update user information

#### Report Generation
- Reservation statistics
- Revenue reports
- Bus occupancy rates
- Most popular trips

---

## B. Architecture Proposal

### 1. Database Schema (ERD)

Based on the provided ERD diagram, here is the detailed structure:

#### Table: **users**
```
PK | id              | int
   | name            | varchar(50)
   | email           | varchar(50)
   | phone           | varchar(50)
   | role            | varchar(20)      -- 'customer' or 'admin'
   | password        | varchar(250)     -- hashed
   | created_at      | timestamp
   | updated_at      | timestamp
```

#### Table: **buses**
```
PK | id                  | int
   | model               | varchar(50)
   | registration_number | varchar(50)
   | passengers_limit    | int
   | status              | varchar(50)      -- 'active', 'maintenance', 'inactive'
   | created_at          | timestamp
   | updated_at          | timestamp
```

#### Table: **trips**
```
PK | id              | int
   | departure_city  | varchar(50)
   | arrival_city    | varchar(50)
   | departure_date  | timestamp
   | arrival_date    | timestamp
   | price           | decimal(10,2)
FK | busId           | int              -- references buses(id)
   | created_at      | timestamp
   | updated_at      | timestamp
```

#### Table: **reservations**
```
PK,FK | tripId            | int              -- references trips(id)
PK,FK | userId            | int              -- references users(id)
      | id                | int              -- unique reservation identifier
      | passengers_number | int
      | status            | varchar(20)      -- 'pending', 'confirmed', 'cancelled'
      | createdAt         | timestamp
      | updated_at        | timestamp
```

#### Relationships:
- **users** (1) ← books → (n) **reservations**
- **trips** (1) ← has → (n) **reservations**
- **buses** (1) ← assigned → (n) **trips**

### 2. MVP Feature List

#### For Visitors (Unauthenticated)
1. ✓ Search for trips (departure/arrival city, date)
2. ✓ View trip details
3. ✓ Register / Login

#### For Customers (Authenticated)
4. ✓ Book a trip
5. ✓ Select number of passengers
6. ✓ Process payment (simulation)
7. ✓ Download/view ticket
8. ✓ View reservation history
9. ✓ Cancel a reservation
10. ✓ Manage profile

#### For Admins
11. ✓ Manage buses (CRUD)
12. ✓ Manage trips (CRUD)
13. ✓ Manage reservations (view, modify status)
14. ✓ Manage users
15. ✓ Generate basic reports

#### Technical Features
16. ✓ Authentication and authorization
17. ✓ Data validation
18. ✓ Error handling
19. ✓ Responsive interface

### 3. Use Case Diagram

Based on the provided diagram, here are the structured use cases:

#### Actor: **Visitor**
- View Trip Details
- Search for Trips

#### Actor: **Customer** - inherits from Visitor
Main use cases:
- Select Seats
- Make a Reservation
- Process Payment
- Download/View Ticket
- Manage Profile
- View Booking History
- Cancel Reservation

Included use cases:
- **Authentication** (required for all above cases)

#### Actor: **Admin**
Main use cases:
- Manage Buses
- Manage Trips
- Manage Bookings
- Manage Users
- Generate Reports

Included use cases:
- **Authentication** (required for all above cases)

### 4. Class Diagram

Based on the provided class diagram:

#### Class: **User** (Abstract)
```
Attributes:
- #id: int
- #name: string
- #email: string
- #phone: string
- #password: string

Methods:
+ createNewUser(a: array): UserEntity
+ authenticate(email: string, password: string): UserEntity
+ updateInfo(a:array, u: userEntity): bool
+ findUser(id: int): UserEntity
```

#### Class: **Customer** (inherits from User)
```
Attributes:
(inherits from User)

Methods:
(inherits from User)
```

#### Class: **Admin** (inherits from User)
```
Attributes:
(inherits from User)

Methods:
(inherits from User)
```

#### Class: **Trip**
```
Attributes:
- id: int
- departure_city: string
- arrival_city: string
- departure_date: string
- arrival_date: string
- price: float
- busId: int

Methods:
+ getAll(): array
+ findTrip(id: int): TripEntity
+ isAvailable(TripEntity): bool

Relationships:
- 0..* Trip "assigned to" 1 Bus
- 0..* Reservation "contains" 1 Trip
```

#### Class: **Bus**
```
Attributes:
- id: int
- model: string
- registration_number: string
- passengers_limit: int
- status: string

Methods:
+ getAll(): array
+ findBus(id: int): BusEntity

Relationships:
- 1 Bus "assigned to" 0..* Trip
```

#### Class: **Reservation**
```
Attributes:
- id: int
- tripId: int
- userId: int
- passengers_number: int
- status: string
- createdAt: DateTime

Methods:
+ getAllTripReservations(t: TripEntity): array
+ findReservation(id: int): ReservationEntity

Relationships:
- 1 User "books" 0..* Reservation
- 1 Trip "contains" 0..* Reservation
```

---

**Creation Date**: January 2026  
**Version**: 1.0  
**Project**: BookBus - Bus Reservation Platform
