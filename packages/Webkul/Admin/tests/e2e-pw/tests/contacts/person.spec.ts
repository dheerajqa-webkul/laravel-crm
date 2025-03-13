import { test, expect } from '@playwright/test';
import { createOrganization, generateCompanyName } from '../contacts/organization.spec'


function generateName() {
    const firstNames = ["John", "Jane", "Michael", "Emily", "David", "Sophia", "Daniel", "Olivia", "Liam", "Emma"];
    return firstNames[Math.floor(Math.random() * firstNames.length)];
}


function generateEmail(firstName) {
    const domains = ["example.com", "testmail.com", "random.org", "fakemail.net"];
    const sanitizedFirstName = firstName.toLowerCase(); // Convert to lowercase for email
    return `${sanitizedFirstName}${Math.floor(Math.random() * 1000)}@${domains[Math.floor(Math.random() * domains.length)]}`;
}

function generatePhone() {
    return `+91${Math.floor(6000000000 + Math.random() * 4000000000)}`; // Indian format
}

const firstName = generateName();
const email = generateEmail(firstName);
const phone = generatePhone();


async function createPerson(page) {
    const firstName = generateName();
    const email = generateEmail(firstName);
    const phone = generatePhone();

    await page.getByRole('link', { name: 'Create Person' }).click();

    await page.getByRole('textbox', { name: 'Name *' }).fill(firstName);
    await page.getByRole('textbox', { name: 'Emails *' }).fill(email);
    await page.getByRole('textbox', { name: 'Contact Numbers' }).fill(phone);
    await page.getByRole('textbox', { name: 'Job Title' }).fill('Manager');

    // Select an organization
    await page.locator('.relative > div > .relative').first().click();
    await page.getByRole('textbox', { name: 'Search...' }).fill('examp');
    await page.getByRole('listitem').filter({ hasText: 'Example' }).click();

    // Save person
    await page.getByRole('button', { name: 'Save Person' }).click();

    // Validate person creation
    await expect(page.locator('#app')).toContainText(email);

    return { firstName, email, phone };
}


test('should be able to create person', async ({ page }) => {

    /**
     * Login to admin panel.
     */
    await page.goto('http://192.168.15.192/laravel-crm-2.0/public/admin/login');
    await page.getByRole('textbox', { name: 'Email Address' }).click();
    await page.getByRole('textbox', { name: 'Email Address' }).fill('admin@example.com');
    await page.getByRole('textbox', { name: 'Password' }).click();
    await page.getByRole('textbox', { name: 'Password' }).fill('admin123');
    await page.getByRole('button', { name: 'Sign In' }).click();

    /**
     * Create person.
     */
    await page.goto('http://192.168.15.192/laravel-crm-2.0/public/admin/contacts/persons');
    await createPerson(page);
});


test('should be able to assign a company to person', async ({ page }) => {
    /**
     * Login to admin panel.
     */
    await page.goto('http://192.168.15.192/laravel-crm-2.0/public/admin/login');
    await page.getByRole('textbox', { name: 'Email Address' }).click();
    await page.getByRole('textbox', { name: 'Email Address' }).fill('admin@example.com');
    await page.getByRole('textbox', { name: 'Password' }).click();
    await page.getByRole('textbox', { name: 'Password' }).fill('admin123');
    await page.getByRole('button', { name: 'Sign In' }).click();
     /**
     * Create Organization.
     */ 
     await page.goto('http://192.168.15.192/laravel-crm-2.0/public/admin/contacts/organizations')
    const companyName= await createOrganization(page);
    
     /**
     * Create person.
     */
    await page.goto('http://192.168.15.192/laravel-crm-2.0/public/admin/contacts/persons');
    await createPerson(page);
    await page.locator('span.icon-edit').nth(1).click();
    await page.locator('div').filter({ hasText: /^Click to add$/ }).nth(2).click();
    await page.getByRole('textbox', { name: 'Search...' }).click();
    await page.getByRole('textbox', { name: 'Search...' }).fill(companyName);
    await page.getByRole('listitem').filter({ hasText: companyName }).locator('span').click();
    await page.getByRole('button', { name: 'Save Person' }).click();
   });


test('should be able to delete person', async ({ page }) => {

    /**
     * Login to admin panel.
     */
    await page.goto('http://192.168.15.192/laravel-crm-2.0/public/admin/login');
    await page.getByRole('textbox', { name: 'Email Address' }).click();
    await page.getByRole('textbox', { name: 'Email Address' }).fill('admin@example.com');
    await page.getByRole('textbox', { name: 'Password' }).click();
    await page.getByRole('textbox', { name: 'Password' }).fill('admin123');
    await page.getByRole('button', { name: 'Sign In' }).click();

    /**
     * Create person.
     */
    await page.goto('http://192.168.15.192/laravel-crm-2.0/public/admin/contacts/persons');
    await createPerson(page);

    /**
     * Delete person.
     */
    await page.locator('span.icon-delete').nth(2).click();
    await page.getByRole('button', { name: 'Agree', exact: true }).click();
    await expect(page.locator('#app')).toContainText('Success');
});
