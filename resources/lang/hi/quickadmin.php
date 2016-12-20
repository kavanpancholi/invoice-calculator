<?php

return [
	'create' => 'बनाइए (क्रिएट)',
	'save' => 'सुरक्षित करे ',
	'edit' => 'संपादित करे (एडिट)',
	'view' => 'देखें',
	'update' => 'सुधारे ',
	'list' => 'सूची',
	'no_entries_in_table' => 'टेबल मे एक भी एंट्री नही है ',
	'custom_controller_index' => 'विशेष(कस्टम) कंट्रोलर इंडेक्स ।',
	'logout' => 'लोग आउट',
	'add_new' => 'नया समाविष्ट करे',
	'are_you_sure' => 'आप निस्चित है ?',
	'back_to_list' => 'सूची पे वापस जाए',
	'dashboard' => 'डॅशबोर्ड ',
	'delete' => 'मिटाइए',
	'quickadmin_title' => 'Invoice Generator',
		'user-management' => [		'title' => 'User Management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',			'position' => 'Position',			'department' => 'Department',			'ref-user-id' => 'Reference',			'reporting-user-id' => 'Reporting Manager',			'supervisor-user-id' => 'Supervisor',			'last-company-name' => 'Last Company Name',			'last-company-position' => 'Last Company Position',			'joining-date' => 'Joining Date',			'ending-date' => 'Ending Date',			'per-month-pay' => 'Per Month Pay',			'per-week-pay' => 'Per Week Pay',			'paypal-email' => 'Paypal Email',		],	],
		'positions' => [		'title' => 'Positions',		'fields' => [			'name' => 'Name',		],	],
		'departments' => [		'title' => 'Departments',		'fields' => [			'name' => 'Name',			'department-head-user' => 'Department Head',		],	],
		'invoice' => [		'title' => 'Invoice',		'fields' => [			'user' => 'User id',			'per-week-pay' => 'Per week Pay',			'from-date' => 'From date',			'to-date' => 'To date',			'last-invoice-at' => 'Last Invoice Date',			'no-of-weeks' => 'No of Weeks',			'total-amount' => 'Total Amount',			'paypal-email' => 'Paypal Email',		],	],
];