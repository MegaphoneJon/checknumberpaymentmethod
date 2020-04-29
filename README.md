# com.megaphonetech.checknumberpaymentmethod

![Screenshot](/images/screenshot.png)

When you enter a new contribution using CiviCRM's back end, and if you select Check as payment method, you can enter a check number. However, some recipients have multiple bank accounts and need to separate their payment methods. This extension allows you to specify one or more payment methods as checks so you can enter a check number when entering contributions.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v5.4+
* CiviCRM (*FIXME: Version number*)

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl com.megaphonetech.checknumberpaymentmethod@https://github.com/MegaphoneJon/checknumberpaymentmethod/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/MegaphoneJon/checknumberpaymentmethod.git
cv en checknumberpaymentmethod
```

## Usage

Upon installation, you can declare certain payment methods to be checks. Visit **Administer » CiviContribute » CiviContribute Component Settings**. Notice the new field called **Check-Payment Instruments** where you can declare one or more payment methods to be *checks*. When you create a new contribution and you select the appropriate payment method, you will see a field where you can enter a check number.

![Screenshot of CiviContribute Component Settings screen](/images/Screenshot_CiviContribute-Component-Settings.png)
![Screenshot of user adding contribution to a second checking account, also with a field for check number](/images/checking-contribution.png)

## Known Issues
