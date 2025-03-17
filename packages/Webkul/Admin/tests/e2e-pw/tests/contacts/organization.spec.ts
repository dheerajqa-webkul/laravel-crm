import { test, expect } from '../../setup';
import { loginAsAdmin } from "../../utils/admin";
import {generateCompanyName, createOrganization} from "../../utils/faker"


test.describe("organization management", () => {
    test('should be able to create organization', async ({ adminPage }) => {

        /**
         * admin login.
         */
        await loginAsAdmin(adminPage);

        /**
         * Create Organization.
         */
        await createOrganization(adminPage);
    });

    test('should be able to edit detail of organization', async ({ adminPage }) => {

        /**
         * Create Organization.
         */
        await loginAsAdmin(adminPage);
        const companyName = await createOrganization(adminPage);

        /**
         * Edit Organization detail.
         */
        // await adminPage.getByText(companyName).locator('span.icon-edit').nth(1).click();
        await adminPage.locator('div').filter({ hasText: companyName }).locator('span.icon-edit').first().click();
        await adminPage.getByRole('textbox', { name: 'City' }).click();
        await adminPage.getByRole('textbox', { name: 'City' }).fill('Gurugram');
        await adminPage.getByRole('button', { name: 'Save Organization' }).click();
        /**
         * Check detail are Edit
         */
        // await adminPage.locator('span.icon-edit').nth(1).click();
        await adminPage.locator('div').filter({ hasText: companyName }).locator('span.icon-edit').first().click();
        await expect(adminPage.getByRole('textbox', { name: 'City' })).toHaveValue('Gurugram');
    });


    test('should be able to delete organization', async ({ adminPage }) => {

        /**
         * Create Organization.
         */
        await loginAsAdmin(adminPage);

        /**
         * Create Organization.
         */
        const companyName = await createOrganization(adminPage);

        /**
         * Delete Organization.
         */
        await adminPage.locator('div')
        .filter ({ hasText: companyName })
        .locator('span.icon-delete')
        .nth(1)
        .waitFor({ state: 'visible' });
      
        await adminPage.locator('div')
        .filter ({ hasText: companyName })
        .locator('span.icon-delete')
        .nth(1)
        .click();  

        await adminPage.getByRole('button', { name: 'Agree', exact: true }).click();
        await expect(adminPage.locator('#app')).toContainText('Success');
        await expect(adminPage.getByText(companyName)).not.toBeVisible();
    });

    test('should be able to mass delete organization', async ({ adminPage }) => {

        /**
         * admin login.
         */
        await loginAsAdmin(adminPage);

        /**
         * Create Multiple Organization.
         */
        await createOrganization(adminPage);
        await createOrganization(adminPage);
        await createOrganization(adminPage);
        await createOrganization(adminPage);
        await createOrganization(adminPage);

        /**
         * mass delete Organization.
         */
        await adminPage.locator('.icon-checkbox-outline').first().click();
        await adminPage.getByRole('button', { name: 'Delete' }).click();
        await adminPage.getByRole('button', { name: 'Agree', exact: true }).click();
        await expect(adminPage.locator('#app')).toContainText('Success');
    });


    test('should not be able to create same name organization', async ({ adminPage }) => {

        /**
           * admin login.
           */
        await loginAsAdmin(adminPage);

        /**
         * Create Organization.
         */
        const companyName = await createOrganization(adminPage);
        await adminPage.getByRole('link', { name: 'Create Organization' }).click();

        /**
         * Fill in organization details
         */
        await adminPage.getByRole('textbox', { name: 'Name *' }).fill(companyName);
        await adminPage.locator('textarea[name="address\\[address\\]"]').fill('ARV Park');
        await adminPage.getByRole('combobox').selectOption('IN');
        await adminPage.locator('select[name="address\\[state\\]"]').selectOption('DL');
        await adminPage.getByRole('textbox', { name: 'City' }).fill('Delhi');
        await adminPage.getByRole('textbox', { name: 'Postcode' }).fill('123456');

        /** 
         * Click to add extra details
         */
        await adminPage.locator('div').filter({ hasText: /^Click to add$/ }).nth(2).click();
        await adminPage.getByRole('textbox', { name: 'Search...' }).fill('exampl');
        await adminPage.getByRole('listitem').filter({ hasText: 'Example' }).click();

        /** 
         * Click on "Save Organization"
         */
        await adminPage.getByRole('button', { name: 'Save Organization' }).click();

        /** 
         * Expect Error message
         */
        await expect(adminPage.locator('#app')).toContainText('The value has already been taken.');

    });
});