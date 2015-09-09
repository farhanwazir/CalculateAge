# CalculateAge
Calculate age in php by age calculator function.

#### Usage
Just call function ageCalculator(Date, format), Date parameter must be DateTime and possible formats are mentioned below.

Examples; 
ageCalculator( new DateTime('1982-07-24') );
If you are using laravel then it is more easy with Carbon like ageCalculator( new Carbon('1982-07-24') );

#### Possible Formats
d -- It returns number of days in numeric
m -- It returns number of months in numeric
y -- It returns number of years in numeric
D -- It returns in string like 5 days or 1 day
