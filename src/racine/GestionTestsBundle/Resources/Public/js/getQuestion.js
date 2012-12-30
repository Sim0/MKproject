  $.ajax({
                                                                    type: 'POST',
                                                                    url: "{{ path('Candidat_do_test') }}",
                                                                    data: {
                                                                       
                                                                        },
                                                                        dataType : 'json',
                                                                        success: function (data,status) {
                                                                             
                                                                             window.quizData = data;
                                                                             console.log(window.quizData);
                                                                              
                                                                         return false;
                                                                                                      },
                                                                       error: function (jqHx,status) {
                                                                
                                                                         return false;
                                                                                                       }
									   
							    		
							    
                                                            });

