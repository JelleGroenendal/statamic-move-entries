![Statamic 5+](https://img.shields.io/badge/Statamic-5+-FF269E?style=for-the-badge&link=https://statamic.com)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/codedge/statamic-move-entries?style=for-the-badge)](https://packagist.org/packages/codedge/statamic-move-entries)
![PHP Version](https://img.shields.io/packagist/php-v/codedge/statamic-move-entries?style=for-the-badge)

# Statamic Move Entries

Move entries from one collection to another in your Control Panel.

**Features:**

- Move one or multiple entries from one collection to another: available in list view and detail view  
- Confirmation question before moving
- German and English localized
- Config to set collections allowed to filter default is all

:warning: Multi-site support only for Statamic Eloquent entries at the moment. 

**Usage:**

In Statamic Control Panel go into one of your collections and select an entry. A new action valled **Move** is going to show up.
Click this action and a popup will come up to let you select the target selection where you want to move your entry to.

![](docs/statamic_cp_list_view.png "Move action from list view")
![](docs/statamic_cp_detail_view.png "Move action from detail view")

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
