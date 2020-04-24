CREATE TABLE public.users (
	id int NOT NULL,
	user_name varchar NOT NULL,
	user_nickname varchar NOT NULL,
	email varchar NOT NULL,
	password varchar NOT NULL,
	branch_office_id integer NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.users
	(branch_office_id);


CREATE TABLE public.restaurant_users (
	id integer NOT NULL,
	restaurant_id varchar NOT NULL,
	user_id varchar NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.restaurant_users
	(restaurant_id);
CREATE INDEX ON public.restaurant_users
	(user_id);


CREATE TABLE public.restaurants (
	id integer NOT NULL,
	restaurant_name varchar NOT NULL,
	rfc varchar NOT NULL,
	PRIMARY KEY (id)
);


CREATE TABLE public.branch_offices (
	id integer NOT NULL,
	branch_office_name varchar NOT NULL,
	restaurant_id integer NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.branch_offices
	(restaurant_id);


CREATE TABLE public.areas (
	id integer NOT NULL,
	area_name varchar NOT NULL,
	PRIMARY KEY (id)
);


CREATE TABLE public.diners (
	id  NOT NULL,
	diner_name varchar NOT NULL,
	diner_nickname varchar NOT NULL,
	PRIMARY KEY (id)
);


CREATE TABLE public.tables (
	id integer NOT NULL,
	table_number varchar NOT NULL,
	branch_office_id integer NOT NULL,
	area_id integer NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.tables
	(branch_office_id);
CREATE INDEX ON public.tables
	(area_id);


CREATE TABLE public.table_diners (
	id integer NOT NULL,
	diner_id integer NOT NULL,
	table_id integer NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.table_diners
	(diner_id);
CREATE INDEX ON public.table_diners
	(table_id);


CREATE TABLE public.ingredients (
	id integer NOT NULL,
	ingredient_name varchar NOT NULL,
	unit varchar NOT NULL,
	quantity double precision NOT NULL,
	branch_office_id integer NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.ingredients
	(branch_office_id);


CREATE TABLE public.foods (
	id integer NOT NULL,
	food_name varchar NOT NULL,
	food_price double precision NOT NULL,
	food_description varchar NOT NULL,
	restaurant_id integer NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.foods
	(restaurant_id);


CREATE TABLE public.food_branch_offices (
	id integer NOT NULL,
	food_id integer NOT NULL,
	branch_office_id integer NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.food_branch_offices
	(food_id);
CREATE INDEX ON public.food_branch_offices
	(branch_office_id);


CREATE TABLE public.drinks (
	id integer NOT NULL,
	drink_name varchar NOT NULL,
	drink_price double precision NOT NULL,
	drink_description varchar NOT NULL,
	restaurant_id integer NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.drinks
	(restaurant_id);


CREATE TABLE public.drink_branch_offices (
	id integer NOT NULL,
	drink_id integer NOT NULL,
	branch_office_id integer NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.drink_branch_offices
	(drink_id);
CREATE INDEX ON public.drink_branch_offices
	(branch_office_id);


CREATE TABLE public.ingredient_recipes (
	id integer NOT NULL,
	ingredient_id integer NOT NULL,
	drink_id integer NOT NULL,
	food_id integer NOT NULL,
	ingredient_unit varchar NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.ingredient_recipes
	(ingredient_id);
CREATE INDEX ON public.ingredient_recipes
	(drink_id);
CREATE INDEX ON public.ingredient_recipes
	(food_id);


CREATE TABLE public.foods_table_diners (
	id integer NOT NULL,
	food_id integer NOT NULL,
	table_diner_id integer NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.foods_table_diners
	(food_id);
CREATE INDEX ON public.foods_table_diners
	(table_diner_id);


CREATE TABLE public.drink_table_diners (
	id integer NOT NULL,
	drink_id integer NOT NULL,
	table_diner_id integer NOT NULL,
	PRIMARY KEY (id)
);

CREATE INDEX ON public.drink_table_diners
	(drink_id);
CREATE INDEX ON public.drink_table_diners
	(table_diner_id);


ALTER TABLE public.restaurant_users ADD CONSTRAINT FK_restaurant_users__restaurant_id FOREIGN KEY (restaurant_id) REFERENCES public.restaurants(id);
ALTER TABLE public.restaurant_users ADD CONSTRAINT FK_restaurant_users__user_id FOREIGN KEY (user_id) REFERENCES public.users(id);
ALTER TABLE public.branch_offices ADD CONSTRAINT FK_branch_offices__restaurant_id FOREIGN KEY (restaurant_id) REFERENCES public.restaurants(id);
ALTER TABLE public.tables ADD CONSTRAINT FK_tables__branch_office_id FOREIGN KEY (branch_office_id) REFERENCES public.branch_offices(id);
ALTER TABLE public.tables ADD CONSTRAINT FK_tables__area_id FOREIGN KEY (area_id) REFERENCES public.areas(id);
ALTER TABLE public.table_diners ADD CONSTRAINT FK_table_diners__diner_id FOREIGN KEY (diner_id) REFERENCES public.diners(id);
ALTER TABLE public.table_diners ADD CONSTRAINT FK_table_diners__table_id FOREIGN KEY (table_id) REFERENCES public.tables(id);
ALTER TABLE public.ingredients ADD CONSTRAINT FK_ingredients__branch_office_id FOREIGN KEY (branch_office_id) REFERENCES public.branch_offices(id);
ALTER TABLE public.foods ADD CONSTRAINT FK_foods__restaurant_id FOREIGN KEY (restaurant_id) REFERENCES public.restaurants(id);
ALTER TABLE public.food_branch_offices ADD CONSTRAINT FK_food_branch_offices__food_id FOREIGN KEY (food_id) REFERENCES public.foods(id);
ALTER TABLE public.food_branch_offices ADD CONSTRAINT FK_food_branch_offices__branch_office_id FOREIGN KEY (branch_office_id) REFERENCES public.branch_offices(id);
ALTER TABLE public.drinks ADD CONSTRAINT FK_drinks__restaurant_id FOREIGN KEY (restaurant_id) REFERENCES public.restaurants(id);
ALTER TABLE public.drink_branch_offices ADD CONSTRAINT FK_drink_branch_offices__drink_id FOREIGN KEY (drink_id) REFERENCES public.drinks(id);
ALTER TABLE public.drink_branch_offices ADD CONSTRAINT FK_drink_branch_offices__branch_office_id FOREIGN KEY (branch_office_id) REFERENCES public.branch_offices(id);
ALTER TABLE public.ingredient_recipes ADD CONSTRAINT FK_ingredient_recipes__ingredient_id FOREIGN KEY (ingredient_id) REFERENCES public.ingredients(id);
ALTER TABLE public.ingredient_recipes ADD CONSTRAINT FK_ingredient_recipes__drink_id FOREIGN KEY (drink_id) REFERENCES public.drinks(id);
ALTER TABLE public.ingredient_recipes ADD CONSTRAINT FK_ingredient_recipes__food_id FOREIGN KEY (food_id) REFERENCES public.foods(id);
ALTER TABLE public.foods_table_diners ADD CONSTRAINT FK_foods_table_diners__food_id FOREIGN KEY (food_id) REFERENCES public.foods(id);
ALTER TABLE public.foods_table_diners ADD CONSTRAINT FK_foods_table_diners__table_diner_id FOREIGN KEY (table_diner_id) REFERENCES public.table_diners(id);
ALTER TABLE public.drink_table_diners ADD CONSTRAINT FK_drink_table_diners__drink_id FOREIGN KEY (drink_id) REFERENCES public.drinks(id);
ALTER TABLE public.drink_table_diners ADD CONSTRAINT FK_drink_table_diners__table_diner_id FOREIGN KEY (table_diner_id) REFERENCES public.table_diners(id);