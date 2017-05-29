import sys
from PyQt4 import QtGui , QtCore

app = QtGui.QApplication( sys.argv )

widget = QtGui.QWidget()
widget.resize( 250 , 150 )
widget.setWindowTitle( '窗口标题' )

# 设置图标
widget.setWindowIcon( QtGui.QIcon( '16-111129230521' ) )

# 设置窗口中间部分的文字tip提示
widget.setToolTip( '<b>文字提示：：：</b>' )
QtGui.QToolTip.setFont( QtGui.QFont( 'OldEnglish' , 12 ) )

# 退出按钮
quit = QtGui.QPushButton( '退出' , widget )
quit.setGeometry( 10 ,20 , 50 ,30 )

# 退出按钮 连接 到py的信号槽机制
widget.connect( quit , QtCore.SIGNAL( 'clicked()' ) , QtGui.qApp , QtCore.SLOT( 'quit()' )  )

reply = QtGui.QMessageBox.question( widget , 'message' , '问题？' , QtGui.QMessageBox.Yes , QtGui.QMessageBox.No )

# 显示窗体部件
widget.show()

sys.exit( app.exec_() )