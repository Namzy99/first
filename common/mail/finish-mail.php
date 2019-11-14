<tr>
        <td bgcolor="#7c72dc" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                      <h1 style="font-size: 32px; font-weight: 400; margin: 0;">Debit Alert.</h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
              <!-- COPY -->
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                  <p style="margin: 0;">Hello <?= $name?>,</p>
                  <p>You have completed a wire transfer with the following information.</p>
                 <table>
                  <tr>
                    <td>Account Name:</td>  
                    <td><?= $accountName?></td>  
                  </tr>
                  <tr>
                    <td>Account Number:</td>  
                    <td><?= $accountNumber?></td>  
                  </tr>
                  <tr>
                    <td>Bank Name:</td>  
                    <td><?= $bankName?></td>  
                  </tr>
                  <tr>
                    <td>Amount Transfered:</td>  
                    <td>$<?= number_format($amount)?>.00</td>  
                  </tr>
                  <tr>
                    <td>Swift Code:</td>  
                    <td><?= $swift?></td>  
                  </tr>
                  <tr>
                    <td>Country:</td>  
                    <td><?= $country?></td>  
                  </tr>
                  <tr>
                    <td>Balance:</td>  
                    <td>$<?= number_format($balance)?>.00</td>  
                  </tr>
                    </table>
              <!-- BULLETPROOF BUTTON -->
              <tr>
                <td bgcolor="#ffffff" align="left">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tr>
                              <td align="center" style="border-radius: 3px;" bgcolor="#7c72dc"><a href="" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #7c72dc; display: inline-block;">Go back to site.</a></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
        </td>
    </tr>