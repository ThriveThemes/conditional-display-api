# Conditional Display API examples #
Example plugin that demonstrates how to extend the Thrive Architect Conditional Display functionality and add custom rules.

After activating, this will add a new entity called 'Page - Demo' with a field named 'Title - Demo'.
It will also add a field called 'Number of comments - Demo' to the already existing 'User' entity.

After activating the plugin, they will be available in the conditional display modal from Thrive Architect:

![image](https://user-images.githubusercontent.com/26145465/155287317-6266c41f-3312-4398-871b-9e74ae3f6ca3.png)

Link to the knowledge base article: https://developer.thrivethemes.com/how-to-develop-custom-rules-for-the-conditional-display-option

---

A list of possible operator/condition keys to use in the `get_conditions` from a field, along with an example of an entity + field group where they are currently used:

- autocomplete ( User -> Username )
- autocomplete_hidden ( User -> Product_Access )
- checkbox ( User -> Role )
- date ( Time -> Current date )
- date_and_time ( Can be used when you don't want to include date intervals - see below )
- date_and_time_with_intervals  ( User -> Last logged in )
- dropdown ( Post -> Post status )
- number_comparison ( Post -> number of comments )
- number_equals ( Time -> Day of month )
- string_comparison ( Request -> Cookie )
- time ( Time -> Time field )
- url_comparison ( Referral -> Url )
