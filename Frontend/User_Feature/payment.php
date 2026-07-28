<?php include 'userNavbar.php'; ?>

<!-- Payment Page Core Layout -->
<div class="section-container" style="padding-bottom: 20px;">
    <div class="section-header">
        <p class="subtitle">Billing Center</p>
        <h2>Plans & Payments Hub</h2>
        <p style="color: #94a3b8; max-width: 600px; font-size: 14px; margin-top: -20px;">
            Select a target analytical allocation tier below to initialize your operational workspace parameter matrices securely.
        </p>
    </div>

    <div class="payment-wrapper-grid" style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 40px; margin-top: 30px;">
        
        <!-- Left Section: Dynamic Matrix Selection & Transaction Panel -->
        <div class="billing-left-column" style="display: flex; flex-direction: column; gap: 30px;">
            
            <!-- Tier Matrices -->
            <div class="tiers-grid-layout" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                
                <!-- Standard Framework Tier -->
                <div class="tier-selection-card active-tier" id="tierStandardCard" onclick="selectPricingTier('Standard', 150.00)">
                    <div class="tier-badge-row">
                        <span class="tier-title">Standard Processing</span>
                        <div class="selection-indicator-dot"><i class="fa-solid fa-circle-check"></i></div>
                    </div>
                    <div class="tier-price-element">$150.00 <span>/ Project</span></div>
                    <p class="tier-desc-text">Covers standard data cleansing algorithms, InsightGather setups, and basic descriptive charts.</p>
                </div>

                <!-- Enterprise Premium Tier -->
                <div class="tier-selection-card" id="tierPremiumCard" onclick="selectPricingTier('Premium Academic', 290.00)">
                    <div class="tier-badge-row">
                        <span class="tier-title">Premium Advisory</span>
                        <div class="selection-indicator-dot"><i class="fa-solid fa-circle-check"></i></div>
                    </div>
                    <div class="tier-price-element">$290.00 <span>/ Framework</span></div>
                    <p class="tier-desc-text">Unlocks EduScholar Thesis packages, StatAnalytics deep testing, and direct OmniConsult blocks.</p>
                </div>

            </div>

            <!-- Secure Input Form Elements -->
            <div class="checkout-card-box">
                <h3><i class="fa-solid fa-shield-halved" style="color: var(--accent-blue);"></i> Secure Transaction Terminal</h3>
                
                <form id="paymentProcessingForm" onsubmit="executeTransactionSequence(event)" style="margin-top: 20px;">
                    <div class="form-group">
                        <label for="billingName">Cardholder Name</label>
                        <input type="text" id="billingName" value="Akeesha Piyadasa" required>
                    </div>

                    <div class="form-group" style="margin-top: 15px;">
                        <label for="cardNumberField">Credit Card Number</label>
                        <div class="input-with-icon-wrapper" style="position: relative;">
                            <input type="text" id="cardNumberField" placeholder="4532 •••• •••• 8824" maxlength="19" required style="padding-left: 45px;">
                            <i class="fa-solid fa-credit-card input-embedded-icon" style="position: absolute; left: 15px; top: 16px; color: var(--text-muted);"></i>
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 15px;">
                        <div class="form-group">
                            <label for="cardExpiry">Expiration Date</label>
                            <input type="text" id="cardExpiry" placeholder="MM/YY" maxlength="5" required>
                        </div>
                        <div class="form-group">
                            <label for="cardCvc">CVC Security Code</label>
                            <input type="password" id="cardCvc" placeholder="•••" maxlength="3" required>
                        </div>
                    </div>

                    <button type="submit" class="cta-btn" id="paySubmitButton" style="margin-top: 30px; width: 100%; padding: 14px;">
                        <i class="fa-solid fa-lock"></i> Authorize Payment ($150.00)
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Section: Order Breakdown Ledger -->
        <div class="billing-summary-column">
            <div class="summary-sticky-card">
                <h3>Transaction Breakdown</h3>
                <p style="font-size: 12px; color: var(--text-muted); margin-bottom: 20px;">Review your processing configuration parameters prior to execution:</p>
                
                <div class="summary-line-item">
                    <span>Selected Vector Matrix:</span>
                    <strong id="summaryTierName">Standard Processing</strong>
                </div>
                <div class="summary-line-item">
                    <span>Database Allocations:</span>
                    <strong>Unlimited Runs</strong>
                </div>
                <div class="summary-line-item">
                    <span>System Maintenance Fee:</span>
                    <strong style="color: #10b981;">FREE</strong>
                </div>
                
                <div class="summary-divider-line"></div>
                
                <div class="summary-total-row">
                    <span>Total Billable Due:</span>
                    <strong id="summaryTotalText">$150.00</strong>
                </div>

                <!-- Interactive Processing Dynamic Alerts -->
                <div id="paymentAlertContainer" style="display: none; margin-top: 20px; padding: 15px; border-radius: 8px; font-size: 13px; line-height: 1.5;">
                    <!-- Appended dynamically via script runtime loops -->
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Transaction State Scripts -->
<script src="../javaScript/user.js">
// Dynamic global tracking attributes
let selectedRate = 150.00;
let selectedLabel = "Standard Processing";

// Swap pricing states smoothly on click triggers
function selectPricingTier(tierLabel, numericRate) {
    selectedRate = numericRate;
    selectedLabel = tierLabel;

    // Toggle active interface highlights
    if(tierLabel === 'Standard') {
        document.getElementById('tierStandardCard').classList.add('active-tier');
        document.getElementById('tierPremiumCard').classList.remove('active-tier');
    } else {
        document.getElementById('tierPremiumCard').classList.add('active-tier');
        document.getElementById('tierStandardCard').classList.remove('active-tier');
    }

    // Refresh display values across the DOM nodes
    document.getElementById('summaryTierName').innerText = `${tierLabel} Matrix`;
    document.getElementById('summaryTotalText').innerText = `$${numericRate.toFixed(2)}`;
    document.getElementById('paySubmitButton').innerHTML = `<i class="fa-solid fa-lock"></i> Authorize Payment ($${numericRate.toFixed(2)})`;
}

// Intercept submittal behaviors to show processing loops
function executeTransactionSequence(event) {
    event.preventDefault();
    
    const submitBtn = document.getElementById('paySubmitButton');
    const alertBox = document.getElementById('paymentAlertContainer');
    
    // Lock controls to prevent multi-firing operations
    submitBtn.disabled = true;
    submitBtn.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> Contacting Bank Verification Nodes...`;

    // Simulate secure network handshakes
    setTimeout(() => {
        submitBtn.innerHTML = `<i class="fa-solid fa-circle-check"></i> Settlement Settled Successfully`;
        submitBtn.style.background = "#10b981";
        
        // Render success prompt inside sidebar diagnostics workspace 
        alertBox.style.display = "block";
        alertBox.style.backgroundColor = "rgba(16, 185, 129, 0.1)";
        alertBox.style.border = "1px solid #10b981";
        alertBox.style.color = "#10b981";
        alertBox.innerHTML = `
            <strong><i class="fa-solid fa-shield-check"></i> Charge Captured!</strong><br>
            Receipt parameter matching $${selectedRate.toFixed(2)} dispatched securely to your workspace ledger history.
        `;
    }, 1500);
}
</script>

<?php include '../commen/footer.php'; ?>