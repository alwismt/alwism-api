<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" /><!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" /><!--<![endif]-->


    <style type="text/css">
    body { margin:0; }
      body, p, div {
        font-family: arial;
        font-size: 14px;
      }
      body {
        color: #000000;
      }
      body a {
        color: #1188E6;
        text-decoration: none;
      }
      p { margin: 0; padding: 0; }
      table.wrapper {
        width:100% !important;
        table-layout: fixed;
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: 100%;
        -moz-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
      }
      img.max-width {
        max-width: 100% !important;
      }
      .column.of-2 {
        width: 50%;
      }
      .column.of-3 {
        width: 33.333%;
      }
      .column.of-4 {
        width: 25%;
      }
      @media screen and (max-width:480px) {
        .preheader .rightColumnContent,
        .footer .rightColumnContent {
            text-align: left !important;
        }
        .preheader .rightColumnContent div,
        .preheader .rightColumnContent span,
        .footer .rightColumnContent div,
        .footer .rightColumnContent span {
          text-align: left !important;
        }
        .preheader .rightColumnContent,
        .preheader .leftColumnContent {
          font-size: 80% !important;
          padding: 5px 0;
        }
        table.wrapper-mobile {
          width: 100% !important;
          table-layout: fixed;
        }
        img.max-width {
          height: auto !important;
          max-width: 480px !important;
        }
        a.bulletproof-button {
          display: block !important;
          width: auto !important;
          font-size: 80%;
          padding-left: 0 !important;
          padding-right: 0 !important;
        }
        .columns {
          width: 100% !important;
        }
        .column {
          display: block !important;
          width: 100% !important;
          padding-left: 0 !important;
          padding-right: 0 !important;
          margin-left: 0 !important;
          margin-right: 0 !important;
        }
        .total_spacer {
          padding:0px 0px 0px 0px;
        }
      }
    </style>
    <!--user entered Head Start-->

     <!--End Head user entered-->
  </head>
  <body>
    <center class="wrapper" data-link-color="#1188E6" data-body-style="font-size: 14px; font-family: arial; color: #000000; background-color: #ebebeb;">
      <div class="webkit">
        <table cellpadding="0" cellspacing="0" border="0" width="100%" class="wrapper" bgcolor="#ebebeb">
          <tr>
            <td valign="top" bgcolor="#ebebeb" width="100%">
              <table width="100%" role="content-container" class="outer" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td width="100%">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td>
                          <!--[if mso]>
                          <center>
                          <table><tr><td width="600">
                          <![endif]-->
                          <table width="100%" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width:600px;" align="center">
                            <tr>
                              <td role="modules-container" style="padding: 0px 0px 0px 0px; color: #000000; text-align: left;" bgcolor="#ffffff" width="100%" align="left">

    <table class="module preheader preheader-hide" role="module" data-type="preheader" border="0" cellpadding="0" cellspacing="0" width="100%"
           style="display: none !important; mso-hide: all; visibility: hidden; opacity: 0; color: transparent; height: 0; width: 0;">
      <tr>
        <td role="module-content">
          <p></p>
        </td>
      </tr>
    </table>

    <table class="wrapper" role="module" data-type="image" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed; color: grey;" bgcolor="grey">
      <tr>
        <td style="text-align: center; font-size:6px; line-height:10px;">
          <img class="max-width" src="{{ $data['logo'] }}" alt="Logo">
        </td>
      </tr>
    </table>

    <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
      <tr>
        <td style="padding:25px 20px 0px 20px;line-height:20px;text-align:center;"
            height="100%"
            valign="top"
            bgcolor="">
            <h2><span style="color:#333333;">Thanks for reaching alwism</span></h2>

        </td>
      </tr>
    </table>

{{-- each news --}}
    <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
      <tr>
        <td style="padding:25px 20px 0px 20px;line-height:20px;text-align:inherit;"
            height="100%"
            valign="top"
            bgcolor="">
            <p>
                <span style="color:#333333;">Hello {{ $data['name'] }},</span> <br>
                Thanks for reaching out to me. I appreciate your interest in [www.alwism.com]. This is to confirm that I've successfully received your contact request. <br><br>
                Here is the information that you've entered: <br>
                <br>
                <b>Your Name:</b> {{ $data['name'] }}, <br />
                <b>Email Address:</b> {{ $data['email'] }}, <br />
                <b>Phone Number:</b> {{ $data['phone'] }}, <br />
                <b>Subject:</b> {{ $data['subject'] }}, <br />
                <b>Message:</b> {{ $data['message'] }} <br />
                    <br />
                I'll respond as soon as I'm able to. If you need immediate assistance or have any further questions, feel free to whatsapp me at {{$data['mywhatsapp']}}.
                <br><br>
                <b>Note: </b>This is an autogenerated email based on your contact me request. Don't reply to this email - I won't get your response.
                <br><br>
                Thanks & Regards,<br>
                Alwis Madhusanka.<br>
                {{$data['mymail']}}<br>
                {{$data['mywhatsapp']}}<br><br>
            </p>

        </td>
      </tr>
    </table>


{{-- each --}}


    <table class="module" role="module" data-type="text" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
      <tr>
        <td style="padding:30px 20px 0px 20px;line-height:22px;text-align:inherit;background-color:#F5F5F5;"
            height="100%"
            valign="top"
            bgcolor="#F5F5F5">
            <div style="text-align: center;"><span style="color:#7a7a7a;"><span style="font-size:11px;">You’re receiving this email because you have requested contact me from www.alwism.com. Your address is listed as {{ $data['email'] }}.</span></span></div>
        </td>
      </tr>
    </table>

    <table class="module" role="module" data-type="social" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout: fixed;">
      <tbody>
        <tr>
          <td valign="top" style="padding:10px 0px 30px 0px;font-size:6px;line-height:10px;background-color:#F5F5F5;">
            <table align="center">
              <tbody>
                <tr>
                <div data-role="module-unsubscribe" class="module unsubscribe-css__unsubscribe___2CDlR" role="module" data-type="unsubscribe" style="font-size:11px;line-height:20px;text-align:center"><div class="Unsubscribe--addressLine"><p class="Unsubscribe--senderName" style="font-family:;font-size:11px;line-height:20px">Alwis Madhusanka</p><p style="font-family:;font-size:11px;line-height:20px"> </p></div><p style="font-family:;font-size:11px;line-height:20px"><a class="Unsubscribe--unsubscribeLink" href="https://www.alwism.com" style="color:#2277ee">Visit to Website</a> - <a class="Unsubscribe--unsubscribePreferences" href="https://www.alwism.com" style="color:#2277ee">[www.alwism.com]</a></p></div>


                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>




                              </td>
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
        </table>
      </div>
    </center>
  </body>
</html>
