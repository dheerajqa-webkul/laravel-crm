import { test, expect } from "../../setup";
import { loginAsAdmin } from "../../utils/admin";
import { generateFullName, generateEmail, generatePhoneNumber,createOrganization } from  "../../utils/faker";

function generateJobProfile() {
    const jobProfiles = [
        "Playwright Automation Tester",
        "Software Engineer",
        "Data Analyst",
        "Project Manager",
        "DevOps Engineer",
        "QA Engineer",
        "UI/UX Designer",
        "Product Manager",
        "Cybersecurity Analyst",
        "Cloud Architect"
    ];
    const randomIndex = Math.floor(Math.random() * jobProfiles.length);
    return jobProfiles[randomIndex];
}

async function createPerson(page) {
    const Name = generateFullName();
    const email = generateEmail();
    const phone = generatePhoneNumber();
    const Job = generateJobProfile();

    await page.getByRole('link', { name: 'Create Person' }).click();

    await page.getByRole('textbox', { name: 'Name *' }).fill(Name);
    await page.getByRole('textbox', { name: 'Emails *' }).fill(email);
    await page.getByRole('textbox', { name: 'Contact Numbers' }).fill(phone);
    await page.getByRole('textbox', { name: 'Job Title' }).fill(Job);

    // Select an organization
    await page.locator('.relative > div > .relative').first().click();
    await page.getByRole('textbox', { name: 'Search...' }).fill('examp');
    await page.getByRole('listitem').filter({ hasText: 'Example' }).click();

    // Save person
    await page.getByRole('button', { name: 'Save Person' }).click();

    // Validate person creation
    await expect(page.locator('#app')).toContainText(email);

    return { Name, email, phone };
}


test('should be able to create person', async ({ adminPage }) => {

    /**
     * admin login.
     */
    await loginAsAdmin(adminPage);

    /**
     * Create person.
     */
    await adminPage.goto('admin/contacts/persons');
    await createPerson(adminPage);
});


test('should be able to assign a company to person', async ({ adminPage }) => {

    /**
     * admin login.
     */
    await loginAsAdmin(adminPage);

     /**
     * Create Organization.
     */ 
    const companyName= await createOrganization(adminPage);
    
     /**
     * Create person.
     */
    await adminPage.goto('admin/contacts/persons');
    await createPerson(adminPage);
    await adminPage.locator('span.icon-edit').first().click();
    await adminPage.locator('div').filter({ hasText: /^Click to add$/ }).nth(2).click();
    await adminPage.getByRole('textbox', { name: 'Search...' }).click();
    await adminPage.getByRole('textbox', { name: 'Search...' }).fill(companyName);
    await adminPage.getByRole('listitem').filter({ hasText: companyName }).locator('span').click();
    await adminPage.getByRole('button', { name: 'Save Person' }).click();
   });


test('should be able to delete person', async ({ adminPage }) => {

    /**
     * admin login.
     */
    await loginAsAdmin(adminPage);

    /**
     * Create person.
     */
    await adminPage.goto('admin/contacts/persons');
    await createPerson(adminPage);

    /**
     * Delete person.
     */
    await adminPage.locator('span.icon-delete').nth(2).click();
    await adminPage.getByRole('button', { name: 'Agree', exact: true }).click();
    await expect(adminPage.locator('#app')).toContainText('Success');
});
