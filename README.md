# ACF Demo child theme for WordPress

## Description

📹 [Check out the accompanying video on YouTube.](https://www.youtube.com/watch?v=EG4WcVeMU-0) 📹

This child theme contains a Cars custom post type with custom Vehicle Details custom fields assigned. You can create a new car post type and fill in information for each car: price, mileage, miles per gallon. After saving your new car post type you can see the custom data output.

There are also two custom taxonomies registered and assigned to the Car post type: Manufacturers (hierarchical) and Vehicle Make (e.g. SUV, Sedan, Truck, Crossover, Electric).

## Requirements

1. ACF plugin - Download for free on [AdvancedCustomFields.com](https://www.advancedcustomfields.com/)
2. [Twenty Nineteen theme](https://wordpress.org/themes/twentynineteen/) is installed on your site.
3. [Download](https://github.com/colorful-tones/acf-demo-child-theme/archive/refs/tags/v.0.0.1.zip) and activate the ACF Demo child theme.

## Getting Started & Setting Up

1. Create a new development site with [Local](https://localwp.com/) (or tool of your choice).
2. [Download the ACF Demo child theme](https://github.com/colorful-tones/acf-demo-child-theme/archive/refs/tags/v.0.0.2.zip) (this repo), and place this theme inside your site's `wp-content/themes/` directory.
3. [Download the Twenty Nineteen theme](https://wordpress.org/themes/twentynineteen/) and place it inside your site's `wp-content/themes/` directory.
4. Use the `car-export.WordPress.2024-11-06.xml` file located inside the ACF Demo child theme to import car data. If you're new to importing XML info into WordPress then check out this helpful video: <https://learn.wordpress.org/tutorial/tools-import-and-export/>
    - Note: The import file does not contain media. You can skip that step. Instead, there is a fallback image for all the cars. You will see the same image for every car on the site.
5. Activate the ACF plugin.
6. Activate the ACF Demo child theme.

At this point you should see a bunch of car information on your site.