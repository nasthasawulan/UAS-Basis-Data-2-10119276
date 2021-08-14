$CALENDAR_ID = "2im30aa8xsazedsvlgmjy0fa9";

$ACCESS_TOKEN = "FnLbYdAQeVFLw7Sbg3FXnqM1LUyNSw"; 


# Setup request to send json via POST.
                                    $payload = json_encode(
                                        array("title" => "A Birthdate",
                                            "description" => "A Birthdate",
                                            "when" => array("object" => "date", "date" => "2000-06-23"),
                                            "calendar_id" => $CALENDAR_ID,
                                        ));

                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

                                    # Pass the access token as an HTTP basic auth username
                                    curl_setopt($ch, CURLOPT_USERPWD, $ACCESS_TOKEN . ":");

                                    # Return response instead of printing.
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                    # Send request.
                                    $result = curl_exec($ch);
                                    curl_close($ch);
                                    # Print response.
                                    echo $result;
