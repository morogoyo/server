/* ***** BEGIN LICENSE BLOCK *****
 * Version: MPL 1.1
 *
 * The contents of this file are subject to the Mozilla Public License Version
 * 1.1 (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 *
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
 * for the specific language governing rights and limitations under the
 * License.
 *
 * The Original Code is Mozilla Communicator client code, released March 31, 1998.
 *
 * The Initial Developer of the Original Code is
 * Netscape Communications Corporation.
 * Portions created by Netscape are Copyright (C) 1998-1999
 * Netscape Communications Corporation.  All Rights Reserved.
 *
 * Contributor(s):
 *
 * IBM
 * -  Binding to permit interfacing between Mozilla and SWT
 * -  Copyright (C) 2003, 2013 IBM Corp.  All Rights Reserved.
 *
 * ***** END LICENSE BLOCK ***** */
package org.eclipse.swt.internal.mozilla;

public class nsIPromptService {

	public static final String NS_IPROMPTSERVICE_IID_STR =
		"1630c61a-325e-49ca-8759-a31b16c47aa5";

	public static final nsID NS_IPROMPTSERVICE_IID =
		new nsID(NS_IPROMPTSERVICE_IID_STR);

	public static final int BUTTON_POS_0 = 1;
	public static final int BUTTON_POS_1 = 256;
	public static final int BUTTON_POS_2 = 65536;
	public static final int BUTTON_TITLE_OK = 1;
	public static final int BUTTON_TITLE_CANCEL = 2;
	public static final int BUTTON_TITLE_YES = 3;
	public static final int BUTTON_TITLE_NO = 4;
	public static final int BUTTON_TITLE_SAVE = 5;
	public static final int BUTTON_TITLE_DONT_SAVE = 6;
	public static final int BUTTON_TITLE_REVERT = 7;
	public static final int BUTTON_TITLE_IS_STRING = 127;
	public static final int BUTTON_POS_0_DEFAULT = 0;
	public static final int BUTTON_POS_1_DEFAULT = 16777216;
	public static final int BUTTON_POS_2_DEFAULT = 33554432;
	public static final int BUTTON_DELAY_ENABLE = 67108864;
	public static final int STD_OK_CANCEL_BUTTONS = 513;
	public static final int STD_YES_NO_BUTTONS = 1027;

	/* outgoing functions removed because this is an implemented interface */
}
