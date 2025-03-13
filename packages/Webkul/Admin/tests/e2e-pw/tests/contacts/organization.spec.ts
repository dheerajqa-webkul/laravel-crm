import { test, expect } from '../../setup';

/**
 * Function to generate a random company name
 */
function generateCompanyName() {
    const prefixes = [
        "Tech", "Software", "Innovate", "NextGen", "Cloud", "AI", "Cyber", "Digital",
        "Technical", "Product", "Organization", "Vendor", "Rock-on", "Super", "Quantum",
        "Neural", "Hyper", "Ultra", "Smart", "Future", "Mega", "Omni", "Virtual", "Dynamic",
        "Secure", "Data", "Meta", "Nano", "Robo", "Infinity", "Vision", "Intelli", "Strato",
        "Blue", "Green", "Red", "White", "Black", "Deep", "Elite", "Prime", "Titan", "Nova",
        "Storm", "Lightning", "Vertex", "Pioneer", "Omnis", "Synergy", "Core", "Nexus"
    ];
    const suffixes = [
        "Solutions", "Systems", "Pvt Ltd", "Technologies", "Enterprises", "Labs", "Networks",
        "Corporation", "Group", "Ventures", "Holdings", "Consulting", "Industries", "Analytics",
        "Innovations", "Services", "Softwares", "Developers", "AI", "Cloud", "Security", "Dynamics",
        "Technica", "Data", "Infotech", "Research", "Automation", "Synergy", "Strategies", "Platform",
        "Operations", "Logistics", "Infrastructure", "Management", "Digital", "Interactive",
        "Vision", "Connect", "Smart", "Solutions Inc", "Partners", "Tech Ltd", "Info Systems",
        "Growth", "Intelligence", "RoboCorp", "Edge", "Enterprise", "Global", "Power", "NextGen",
        "Creative"
    ];
    return `${prefixes[Math.floor(Math.random() * prefixes.length)]} ${suffixes[Math.floor(Math.random() * suffixes.length)]}`;
}

/**
 * Function to automate organization creation
 */
async function createOrganization(page) {
    const companyName = generateCompanyName();

    /**
     * Click on "Create Organization" button
     */
    await page.getByRole('link', { name: 'Create Organization' }).click();

    /**
     * Fill in organization details
     */
    await page.getByRole('textbox', { name: 'Name *' }).fill(companyName);
    await page.locator('textarea[name="address\\[address\\]"]').fill('ARV Park');
    await page.getByRole('combobox').selectOption('IN');
    await page.locator('select[name="address\\[state\\]"]').selectOption('DL');
    await page.getByRole('textbox', { name: 'City' }).fill('Delhi');
    await page.getByRole('textbox', { name: 'Postcode' }).fill('123456');

    /** 
     * Click to add extra details
     */
    await page.locator('div').filter({ hasText: /^Click to add$/ }).nth(2).click();
    await page.getByRole('textbox', { name: 'Search...' }).fill('exampl');
    await page.getByRole('listitem').filter({ hasText: 'Example' }).click();

    /** 
     * Click on "Save Organization"
     */
    await page.getByRole('button', { name: 'Save Organization' }).click();

    await expect(page.getByText(companyName)).toBeVisible();

    return companyName;
}

export { createOrganization, generateCompanyName };


test('should be able to create organization', async ({ adminPage }) => {
    /**
     * Create Organization.
     */
    await adminPage.goto('admin/contacts/organizations')
    await createOrganization(adminPage);
});

test('should be able to edit detail of organization', async ({ adminPage }) => {

    /**
     * Create Organization.
     */
    await adminPage.goto('admin/contacts/organizations')
    const companyName = await createOrganization(adminPage);

    /**
     * Edit Organization detail.
     */
    await adminPage.locator('span.icon-edit').nth(1).click();
    await adminPage.getByRole('textbox', { name: 'City' }).click();
    await adminPage.getByRole('textbox', { name: 'City' }).fill('Gurugram');
    await adminPage.getByRole('button', { name: 'Save Organization' }).click();
    /**
     * Check detail are Edit
     */
    await adminPage.locator('span.icon-edit').nth(1).click();
    await expect(adminPage.getByRole('textbox', { name: 'City' })).toHaveValue('Gurugram');
});


test('should be able to delete organization', async ({ page }) => {

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
    await page.goto('http://192.168.15.192/laravel-crm-2.0/public/admin/contacts/organizations');
    const companyName = await createOrganization(page);

    /**
     * Delete Organization.
     */
    await page.locator('span.icon-delete').nth(2).click();
    await page.getByRole('button', { name: 'Agree', exact: true }).click();
    await expect(page.locator('#app')).toContainText('Success');
    await expect(page.getByText(companyName)).not.toBeVisible();
});

test('should be able to mass delete organization', async ({ page }) => {

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
     * Create Multiple Organization.
     */
    await page.goto('http://192.168.15.192/laravel-crm-2.0/public/admin/contacts/organizations');
    await createOrganization(page);
    await createOrganization(page);
    await createOrganization(page);
    await createOrganization(page);
    await createOrganization(page);

    /**
     * mass delete Organization.
     */
    await page.locator('.icon-checkbox-outline').first().click();
    await page.getByRole('button', { name: 'Delete' }).click();
    await page.getByRole('button', { name: 'Agree', exact: true }).click();
    await expect(page.locator('#app')).toContainText('Success');
});


test('should not be able to create same name organization', async ({ page }) => {

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
    await page.goto('http://192.168.15.192/laravel-crm-2.0/public/admin/contacts/organizations');
    const companyName = await createOrganization(page);
    await page.getByRole('link', { name: 'Create Organization' }).click();

    /**
     * Fill in organization details
     */
    await page.getByRole('textbox', { name: 'Name *' }).fill(companyName);
    await page.locator('textarea[name="address\\[address\\]"]').fill('ARV Park');
    await page.getByRole('combobox').selectOption('IN');
    await page.locator('select[name="address\\[state\\]"]').selectOption('DL');
    await page.getByRole('textbox', { name: 'City' }).fill('Delhi');
    await page.getByRole('textbox', { name: 'Postcode' }).fill('123456');

    /** 
     * Click to add extra details
     */
    await page.locator('div').filter({ hasText: /^Click to add$/ }).nth(2).click();
    await page.getByRole('textbox', { name: 'Search...' }).fill('exampl');
    await page.getByRole('listitem').filter({ hasText: 'Example' }).click();

    /** 
     * Click on "Save Organization"
     */
    await page.getByRole('button', { name: 'Save Organization' }).click();

    /** 
     * Expect Error message
     */
    await expect(page.locator('#app')).toContainText('The value has already been taken.');

});