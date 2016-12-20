<?php

return [
	'create' => 'Δημιουργία',
	'save' => 'Αποθήκευση',
	'edit' => 'Επεξεργασία',
	'view' => 'Εμφάνιση',
	'update' => 'Ενημέρωησ',
	'list' => 'Λίστα',
	'no_entries_in_table' => 'Δεν υπάρχουν δεδομένα στην ταμπέλα',
	'custom_controller_index' => 'index προσαρμοσμένου controller.',
	'logout' => 'Αποσύνδεση',
	'add_new' => 'Προσθήκη νέου',
	'are_you_sure' => 'Είστε σίγουροι;',
	'back_to_list' => 'Επιστροφή στην λίστα',
	'dashboard' => 'Dashboard',
	'delete' => 'Διαγραφή',
	'quickadmin_title' => 'Invoice Generator',
		'user-management' => [		'title' => 'User Management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',			'position' => 'Position',			'department' => 'Department',			'ref-user-id' => 'Reference',			'reporting-user-id' => 'Reporting Manager',			'supervisor-user-id' => 'Supervisor',			'last-company-name' => 'Last Company Name',			'last-company-position' => 'Last Company Position',			'joining-date' => 'Joining Date',			'ending-date' => 'Ending Date',			'per-month-pay' => 'Per Month Pay',			'per-week-pay' => 'Per Week Pay',			'paypal-email' => 'Paypal Email',		],	],
		'positions' => [		'title' => 'Positions',		'fields' => [			'name' => 'Name',		],	],
		'departments' => [		'title' => 'Departments',		'fields' => [			'name' => 'Name',			'department-head-user' => 'Department Head',		],	],
		'invoice' => [		'title' => 'Invoice',		'fields' => [			'user' => 'User id',			'per-week-pay' => 'Per week Pay',			'from-date' => 'From date',			'to-date' => 'To date',			'last-invoice-at' => 'Last Invoice Date',			'no-of-weeks' => 'No of Weeks',			'total-amount' => 'Total Amount',			'paypal-email' => 'Paypal Email',		],	],
];